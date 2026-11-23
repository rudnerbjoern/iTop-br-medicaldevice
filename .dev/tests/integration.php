<?php

/**
 * Exercises DICOM flow synchronization against the isolated iTop test database.
 */

declare(strict_types=1);

use BR\Extension\Medicaldevice\DataFlows\BackgroundProcess\MedicalDicomFlowRepair;
use BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync;
use Combodo\iTop\Service\InterfaceDiscovery\InterfaceDiscovery;
use ItopDevelopment\Tests\Support\TestDatabaseGuard;

require '/workspace/tests/Support/TestDatabaseGuard.php';
TestDatabaseGuard::assertIsolated(getenv('ITOP_TEST_MODE'), getenv('ITOP_TEST_DB_HOST'), getenv('ITOP_TEST_DB_NAME'), getenv('ITOP_TEST_DB_USER'));
require '/var/www/html/approot.inc.php';
require_once APPROOT.'core/config.class.inc.php';
$config = new Config(APPROOT.'conf/production/config-itop.php');
TestDatabaseGuard::assertIsolated('1', $config->Get('db_host'), $config->Get('db_name'), $config->Get('db_user'));
require_once APPROOT.'application/startup.inc.php';

/** Reports a successful scenario or stops the integration run with its failing case name. */
function checkFlow(bool $condition, string $case): void
{
    if (!$condition) {
        throw new RuntimeException($case);
    }
    echo "PASS: $case\n";
}

/**
 * Loads the managed flows of a link, including obsolete flows, and checks that each leg is unique.
 *
 * @return array<string, MedicalDicomDataFlow> Flows keyed by leg.
 */
function storedLegs(int $id): array
{
    $filter = DBObjectSearch::FromOQL('SELECT MedicalDicomDataFlow WHERE dicom_link_id = :link');
    $filter->SetShowObsoleteData(true);
    $rows = new DBObjectSet($filter, [], ['link' => $id]);
    $legs = [];
    while ($flow = $rows->Fetch()) {
        $leg = $flow->Get('dicom_leg');
        if (isset($legs[$leg])) {
            throw new RuntimeException('Duplicate leg');
        }
        $legs[$leg] = $flow;
    }
    return $legs;
}

checkFlow(UserRights::CheckCredentials('admin', getenv('ITOP_TEST_ADMIN_PASSWORD')) && UserRights::Login('admin') && UserRights::IsAdministrator(), 'isolated admin');
checkFlow(MetaModel::IsValidClass('MedicalDicomDataFlow'), 'bridge selected with Flow Management');
checkFlow(in_array(MedicalDicomFlowRepair::class, InterfaceDiscovery::GetInstance()->FindItopClasses(iProcess::class), true),
    'iTop cron discovers the DICOM repair process');
// Inspect the objects installed by setup before the test writes any fixtures.
$demoOrg = MetaModel::GetObjectFromOQL("SELECT Organization WHERE code = 'DEMO-RAD'");
checkFlow($demoOrg !== null, 'setup imports the demo radiology organization');
$demoScope = ['org' => $demoOrg->GetKey()];
$ct = MetaModel::GetObjectFromOQL("SELECT MedicalDicomApplicationEntity WHERE org_id = :org AND aetitle = 'DEMO_CT'", $demoScope);
$pacs = MetaModel::GetObjectFromOQL("SELECT MedicalDicomApplicationEntity WHERE org_id = :org AND aetitle = 'DEMO_PACS'", $demoScope);
checkFlow($ct && $pacs && $ct->Get('role') === 'SCU' && $pacs->Get('role') === 'SCP', 'setup imports both demo endpoints with their DICOM roles');
$scanner = MetaModel::GetObject('MedicalDeviceMIE', $ct->Get('medicaldevicemie_id'));
$server = MetaModel::GetObject('Server', $pacs->Get('functionalci_id'));
checkFlow($scanner->Get('name') === 'Demo CT Scanner' && $server->Get('name') === 'Demo PACS Server'
    && $scanner->Get('org_id') == $demoOrg->GetKey() && $server->Get('org_id') == $demoOrg->GetKey(), 'demo endpoints resolve to the CT scanner and PACS server');
$demoLink = MetaModel::GetObjectFromOQL("SELECT MedicalDicomCommunicationLink WHERE org_id = :org AND source_ae_id = :ct AND target_ae_id = :pacs AND direction = 'PUSH'",
    $demoScope + ['ct' => $ct->GetKey(), 'pacs' => $pacs->GetKey()]);
checkFlow($demoLink && $demoLink->Get('status') === 'production', 'setup imports the production CT-to-PACS PUSH link');
$demoLegs = storedLegs((int) $demoLink->GetKey());
checkFlow(array_keys($demoLegs) === ['forward'] && $demoLegs['forward']->Get('status') === 'active'
    && $demoLegs['forward']->Get('source_id') == $scanner->GetKey() && $demoLegs['forward']->Get('destination_id') == $server->GetKey(),
    'the demo link has one active CT-to-PACS flow immediately after setup');

CMDBSource::Query('START TRANSACTION');
try {
    $byOrg = [];
    $servers = new DBObjectSet(DBObjectSearch::FromOQL('SELECT Server'));
    while ($server = $servers->Fetch()) {
        $org = (int) $server->Get('org_id');
        $byOrg[$org][] = (int) $server->GetKey();
        if (count($byOrg[$org]) === 2) {
            break;
        }
    }
    checkFlow(isset($org) && count($byOrg[$org]) === 2, 'two server fixtures in one organization');
    [$a, $b] = $byOrg[$org];
    $aes = [];
    foreach ([$a, $b] as $i => $host) {
        $ae = MetaModel::NewObject('MedicalDicomApplicationEntity', [
            'org_id' => $org, 'aetitle' => 'FLOW_TEST_'.$i, 'role' => 'BOTH', 'modality' => 'CT',
            'protocol' => 'dicomweb', 'endpoint_url' => 'https://example.org/dicomweb', 'functionalci_id' => $host,
        ]);
        $ae->DBInsert();
        $aes[] = $ae;
    }
    $link = MetaModel::NewObject('MedicalDicomCommunicationLink', [
        'org_id' => $org, 'source_ae_id' => $aes[0]->GetKey(), 'target_ae_id' => $aes[1]->GetKey(),
        'direction' => 'BIDIR', 'status' => 'production', 'description' => 'round trip',
    ]);
    $id = (int) $link->DBInsert();
    $legs = storedLegs($id);
    checkFlow(count($legs) === 2 && (int) $legs['forward']->Get('source_id') === $a && (int) $legs['reverse']->Get('source_id') === $b, 'BIDIR creates opposite payload legs');
    $reverse = $legs['reverse'];
    $reverseId = $reverse->GetKey();
    $reverse->Set('execution_frequency', 'monthly');
    $reverse->DBUpdate();
    $link->Set('direction', 'PULL');
    $link->Set('status', 'planned');
    $link->Set('description', 'revised');
    $link->DBUpdate();
    $legs = storedLegs($id);
    checkFlow(count($legs) === 1 && $legs['reverse']->GetKey() == $reverseId && $legs['reverse']->Get('status') === 'inactive'
        && $legs['reverse']->Get('description') === 'revised' && $legs['reverse']->Get('execution_frequency') === 'monthly', 'PULL retains reverse ID and enrichment, synchronizes fields, removes forward leg');
    $reverse = $legs['reverse'];
    $reverse->Set('description', 'independent change');
    checkFlow(!$reverse->CheckToWrite()[0], 'managed flow fields reject direct changes');
    $plan = new DeletionPlan();
    checkFlow(!$reverse->CheckToDelete($plan), 'direct flow deletion rejected');

    $aes[1]->Set('functionalci_id', 0);
    $aes[1]->DBUpdate();
    checkFlow(storedLegs($id) === [], 'unmapping an AE withdraws stale flows');
    $aes[1]->Set('functionalci_id', $a);
    $aes[1]->DBUpdate();
    checkFlow(storedLegs($id) === [], 'AEs on the same host produce no self-loop');
    $aes[1]->Set('functionalci_id', $b);
    $aes[1]->DBUpdate();
    checkFlow(count(storedLegs($id)) === 1, 'remapping an AE restores its flow');

    // Model a record predating the bridge without firing a live update callback.
    $table = MetaModel::DBGetTable('MedicalDicomCommunicationLink');
    CMDBSource::Query("UPDATE `$table` SET direction = 'BIDIR' WHERE id = $id");
    checkFlow(MedicalDicomFlowSync::reconcile($id, true)['create'] === 1 && count(storedLegs($id)) === 1, 'preview detects missing leg without writing');
    MedicalDicomFlowSync::reconcileAll();
    checkFlow(count(storedLegs($id)) === 2 && array_sum(MedicalDicomFlowSync::reconcile($id)) === 0, 'installer backfill and rerun converge');
    // Force an error on the second projected update and verify the first update rolled back.
    CMDBSource::Query("UPDATE `$table` SET description = 'recovered' WHERE id = $id");
    $listener = \Combodo\iTop\Service\Events\EventService::RegisterListener(EVENT_DB_CHECK_TO_WRITE, static function ($event) {
        $object = $event->Get('object');
        if ($object instanceof MedicalDicomDataFlow && $object->Get('dicom_leg') === 'reverse') {
            $object->AddCheckIssue('Integration test: reject the second leg');
        }
    }, 'MedicalDicomDataFlow');
    try {
        $rejected = false;
        try {
            MedicalDicomFlowSync::reconcile($id);
        } catch (CoreCannotSaveObjectException $expected) {
            $rejected = true;
        }
        $legs = storedLegs($id);
        checkFlow($rejected && $legs['forward']->Get('description') === 'revised'
            && $legs['reverse']->Get('description') === 'revised', 'failed second update rolls back both legs');
    } finally {
        \Combodo\iTop\Service\Events\EventService::UnRegisterListener($listener);
    }
    (new MedicalDicomFlowRepair())->Process(time() + 60);
    $legs = storedLegs($id);
    checkFlow($legs['forward']->Get('description') === 'recovered' && $legs['reverse']->Get('description') === 'recovered',
        'cron retry repairs both legs');
    $manual = MetaModel::NewObject('DataFlow', ['name' => 'Independent flow', 'org_id' => $org,
        'source_id' => $a, 'destination_id' => $b]);
    $manualId = $manual->DBInsert();
    $push = MetaModel::NewObject('MedicalDicomCommunicationLink', [
        'org_id' => $org, 'source_ae_id' => $aes[0]->GetKey(), 'target_ae_id' => $aes[1]->GetKey(),
        'direction' => 'PUSH', 'status' => 'production',
    ]);
    $pushLegs = storedLegs((int) $push->DBInsert());
    checkFlow(count($pushLegs) === 1 && (int) $pushLegs['forward']->Get('destination_id') === $b,
        'parallel PUSH approval owns a distinct forward leg');
    $nativeMap = new DBObjectSet(DBObjectSearch::FromOQL('SELECT DataFlow WHERE id = :id AND source_id = :ci'), [],
        ['id' => $pushLegs['forward']->GetKey(), 'ci' => $a]);
    checkFlow($nativeMap->Count() === 1, 'native outbound flow query includes the DICOM subclass');
    $link = MetaModel::GetObject('MedicalDicomCommunicationLink', $id);
    $link->DBDelete();
    checkFlow(storedLegs($id) === [], 'deleting the owning link cascades to both managed legs');
    checkFlow(count(storedLegs((int) $push->GetKey())) === 1 && MetaModel::GetObject('DataFlow', $manualId)->Get('name') === 'Independent flow',
        'deleting an approval preserves parallel approvals and independent native flows');
} finally {
    CMDBSource::Query('ROLLBACK');
}
