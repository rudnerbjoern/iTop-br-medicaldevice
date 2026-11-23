# Using DICOM Elements in iTop

## Purpose and Scope

The DICOM elements in this extension are designed to document and govern **DICOM-based communication** in clinical and laboratory environments.

They allow you to:

* Explicitly document **DICOM Application Entities (AE)**
* Define and govern **DICOM communication paths** between systems
* Enforce **basic DICOM governance rules** (roles, endpoints, uniqueness)

This extension does **not** perform DICOM communication itself.

## MedicalDicomApplicationEntity (DICOM AE)

### Concept

A **MedicalDicomApplicationEntity** represents a logical DICOM endpoint, identified by:

* AE Title
* DICOM role (SCU / SCP / BOTH)
* Port type / protocol
* Classical network endpoint for DICOM / DICOM TLS (IP address and port)
* DICOMweb endpoint URL for web-based DICOM communication
* Optional modality
* Optional link to medical imaging equipment and technical host

### Creating a DICOM AE

Navigate to:

> Medical Devices → DICOM → DICOM AE

Mandatory and recommended attributes:

| Attribute                 | Description                                                            |
| ------------------------- | ---------------------------------------------------------------------- |
| AE Title                  | Unique DICOM AE identifier (1–16 characters)                           |
| Organization              | Owning organization (governance scope)                                 |
| Role                      | SCP, SCU, or BOTH                                                      |
| Port Type / Protocol      | Type of DICOM communication, e.g. DICOM, DICOM TLS, DICOMweb, or other |
| IP Address                | Required for SCU / BOTH when using DICOM or DICOM TLS                  |
| Port                      | Required for SCU / BOTH when using DICOM or DICOM TLS                  |
| Endpoint URL              | Required when using DICOMweb                                           |
| Modality                  | Recommended for SCU / BOTH                                             |
| Medical Imaging Equipment | Optional link to a physical device                                     |
| Functional CI             | Technical host (server or VM)                                          |

### Port Type / Protocol

The protocol attribute describes the type of DICOM-related communication used by the AE endpoint.

| Value     | Meaning                                      |
| --------- | -------------------------------------------- |
| DICOM     | Classic DICOM communication over TCP         |
| DICOM TLS | DICOM communication over TLS-secured TCP     |
| DICOMweb  | Web-based DICOM communication                |
| Other     | Other or project-specific communication type |

The IP Address field selects an `IPAddress` from TeemIP IP Management.
The selector includes addresses owned by the AE's organization or its
child organizations. Install `teemip-ip-mgmt` 3.3.1 or later so setup
can resolve this field, including on installations that only use DICOMweb.

For classic DIMSE-based DICOM communication, use `DICOM`.

For encrypted DIMSE communication, use `DICOM TLS`.

For web-based DICOM services such as QIDO-RS, WADO-RS or STOW-RS, use `DICOMweb`.

When `DICOMweb` is selected, the **Endpoint URL** must be documented. IP address and port are not mandatory for DICOMweb endpoints, because the relevant technical endpoint is the HTTP(S) base URL.

Example DICOMweb endpoint URLs:

```text
https://pacs.example.org/dicomweb
https://orthanc.example.org/dicom-web
https://server.example.org/api/dicom
```

### Endpoint URL

The **Endpoint URL** documents the base URL of a DICOMweb endpoint.

It is only required when the selected protocol is `DICOMweb`.

Examples:

| Endpoint URL                            | Description                           |
| --------------------------------------- | ------------------------------------- |
| `https://pacs.example.org/dicomweb`     | PACS DICOMweb base endpoint           |
| `https://orthanc.example.org/dicom-web` | Orthanc DICOMweb endpoint             |
| `https://server.example.org/api/dicom`  | Vendor-specific DICOMweb API endpoint |

Do not use this field for classic DICOM or DICOM TLS endpoints unless a project-specific reason exists.

### Role Semantics

| Role | Meaning                           |
| ---- | --------------------------------- |
| SCP  | Service Class Provider (receiver) |
| SCU  | Service Class User (sender)       |
| BOTH | Acts as both SCU and SCP          |

Governance rules enforced:

* For SCU and BOTH with protocol `DICOM` or `DICOM TLS`, IP address and port are required
* For protocol `DICOMweb`, Endpoint URL is required
* If a port is specified, it must be within the valid port range `1..65535`
* For SCU and BOTH, modality is required as a governance/classification rule
* AE Title must be unique per organization

Different AE titles can share the same IP address and TCP port, even with the same
protocol. For example, `PACS_ARCHIVE` and `PACS_RESEARCH` can both accept classic
DICOM connections at `192.0.2.10:104`. See [DICOM PS3.8, C.2](https://dicom.nema.org/medical/dicom/current/output/chtml/part08/sect_C.2.html).

## MedicalDicomCommunicationLink

### Communication Link Purpose

A **MedicalDicomCommunicationLink** documents a governed DICOM communication relationship between two AEs.

It represents intended communication and governance, not runtime traffic.

### Creating a Communication Link

Navigate to:

> Medical Devices → DICOM → DICOM Communication Links

Define the following attributes:

| Attribute    | Description                                         |
| ------------ | --------------------------------------------------- |
| Organization | Governance scope                                    |
| Source AE    | AE initiating the documented operation              |
| Target AE    | AE receiving the request                            |
| Direction    | PUSH, PULL, or BIDIR                                |
| Status       | planned, approved, production, deprecated, obsolete |
| Description  | Optional clinical or technical notes                |

### Direction Semantics

| Direction | Interpretation                    | Payload arrows on the optional CI flow map |
| --------- | --------------------------------- | ------------------------------------------ |
| PUSH      | Source sends data to target       | Source → target                            |
| PULL      | Source retrieves data from target | Target → source                            |
| BIDIR     | Bidirectional communication       | One arrow in each direction                |

### Governance Rules

The following validations are enforced:

1. Source and target must not be identical
2. Source AE must not be SCP-only
3. Target AE must not be SCU-only
4. Only one identical link per organization, source, target, and direction

A workstation can have both a `PUSH` and a `PULL` link to the same PACS, each
with its own status. The workstation is the source in both records. `BIDIR` is a
separate direction and can coexist with either entry.

For imports using the default reconciliation key, include the organization,
source AE, target AE, and direction to match the intended link. When upgrading
an existing import that matches by endpoint pair, add the direction before
importing multiple links for that pair.

These rules apply to all write paths (UI, CSV import, REST API, synchronization).

## Lifecycle Management

### Status Attribute

The lifecycle status supports governance and change management:

| Link status | Meaning                       | Status of generated flows |
| ----------- | ----------------------------- | ------------------------- |
| planned     | Intended but not yet approved | Inactive                  |
| approved    | Approved for implementation   | Inactive                  |
| production  | Active clinical use           | Active                    |
| deprecated  | Planned for removal           | Active                    |
| obsolete    | No longer valid               | Inactive                  |

## DICOM data flows

When Medical Devices and **Applications data flows** are selected in iTop setup,
the optional bridge maps each eligible DICOM link onto the native CI flow map.
Open the **DICOM data flows** tab on a communication link or an AE to inspect
its flows. Follow a flow's **DICOM communication link** field to open the
governing record. To see inactive flows in views that filter obsolete objects,
enable the display of obsolete objects.

### Endpoint assignments

Assign each AE to a technical host (server or VM) or to a medical imaging
device. Each AE must resolve to one CI, the two CIs must be distinct, and both
AEs and CIs must belong to the link's organization. If an assignment is
missing, ambiguous or outside that organization, or both AEs share a host,
the bridge keeps the DICOM link, removes its generated flows and logs the link
ID for review. Correcting the assignments restores the applicable flows.

### Editing and deleting flows

Edit the communication link to change the endpoints, direction, organization,
description or status. The bridge maintains these values on the corresponding
flows and generates their names. On a generated flow, you can set the
execution frequency, source and destination impact, type and protocol.
New flows start with unspecified frequency and both impact flags set to *No*.

Each flow belongs to one link and one payload direction. Changing a link from
BIDIR to PULL, for example, keeps the reverse flow's ID and its manually
entered values and removes the forward flow. Deleting a link removes its flows
through iTop's standard deletion plan. The usual CI reference and cascade
rules apply. Separately maintained flows and flows owned by parallel links
keep their own records. [Native iTop flow model](https://github.com/Combodo/iTop/blob/3.3.0-1/datamodels/2.x/itop-flow-map/datamodel.itop-flow-map.xml)

### Setup and recovery

Back up the database before upgrading. Deploy the bundle and run iTop setup
with both `br-medicaldevice` and `itop-flow-map` selected.
After schema creation, the bridge installer reconciles existing links and
writes the totals to the setup log. Saving a link or changing an AE's host or
organization triggers the same reconciliation. The bridge locks each link and
applies all changes to its flows in one transaction. Repeating the operation
preserves matching records.

With iTop cron running, the bridge checks up to 100 links every 15 minutes and
resumes at the last processed ID. If an update fails, use the link ID in the iTop
log to inspect endpoint assignments or blocking references. Cron can retry the
change after the cause is corrected.

To preview the counts of flows to create, update or delete and links requiring
review, run the following in an initialized administrative iTop context.
Calling `MedicalDicomFlowSync::reconcileAll()` applies the changes.

```php
use BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync;

MedicalDicomFlowSync::reconcileAll(true);
```

## Installed CT and PACS example

On a fresh installation, select the demo data option in iTop setup. In the
**Demo Radiology** organization, open **Medical Devices → DICOM → DICOM
Communication Links**. The production PUSH link connects the scanner endpoint
**DEMO_CT** to the archive endpoint **DEMO_PACS** using DICOMweb (STOW-RS).
The base module supplies both endpoints and their CIs.

With **Applications data flows** and the bridge enabled, the link's **DICOM
data flows** tab shows one active flow from **Demo CT Scanner** to **Demo PACS
Server**. Production installations that omit demo data skip the example.

## Example Modeling Patterns

### CT Scanner communicating with PACS using classic DICOM

1. Create DICOM AE for CT:

   * Protocol: DICOM
   * Role: SCU
   * Modality: CT
   * IP Address and Port documented
2. Create DICOM AE for PACS:

   * Protocol: DICOM
   * Role: SCP
   * IP Address and Port documented if applicable
3. Create Communication Link:

   * Source: CT AE
   * Target: PACS AE
   * Direction: PUSH
   * Status: production

### System exposing a DICOMweb endpoint

1. Create DICOM AE for the DICOMweb-capable system:

   * Protocol: DICOMweb
   * Role: SCP or BOTH
   * Endpoint URL documented
2. Create Communication Link if the communication path should be governed:

   * Source: consuming AE or system
   * Target: DICOMweb AE
   * Direction: PULL or BIDIR
   * Status: production

## Best Practices

* Model one AE per logical endpoint
* Use `DICOM` for classic DIMSE-based DICOM communication
* Use `DICOM TLS` for TLS-secured DIMSE communication
* Use `DICOMweb` only for HTTP(S)-based DICOMweb services
* Document the Endpoint URL for all DICOMweb endpoints
* Use BOTH only when technically justified
* Always assign an organization
* Prefer deprecating links over deleting them
* Use descriptions for clinical context or vendor-specific details

## Limitations

This model does not:

* Monitor live DICOM traffic
* Validate DICOM protocol conformance
* Test endpoint availability
* Perform automatic discovery
* Store credentials, tokens or API keys

It is a CMDB and governance model only.
