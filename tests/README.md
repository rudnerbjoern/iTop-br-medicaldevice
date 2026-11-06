# PHP tests

Run from the repository root with PHP 8.0 or later, SimpleXML, and DOM enabled.
First download the two standalone schemas used by the project's XML files:

```sh
mkdir -p .tmp/schemas/3.2
curl --fail --location https://rudnerbjoern.github.io/iTop-schema/extension.xsd -o .tmp/schemas/extension.xsd
curl --fail --location https://rudnerbjoern.github.io/iTop-schema/3.2/itop_design.xsd -o .tmp/schemas/3.2/itop_design.xsd
```

PowerShell alternative:

```powershell
New-Item -ItemType Directory -Force .tmp/schemas/3.2 | Out-Null
Invoke-WebRequest https://rudnerbjoern.github.io/iTop-schema/extension.xsd -OutFile .tmp/schemas/extension.xsd
Invoke-WebRequest https://rudnerbjoern.github.io/iTop-schema/3.2/itop_design.xsd -OutFile .tmp/schemas/3.2/itop_design.xsd
```

Alternatively, set `ITOP_SCHEMA_DIR` to an existing iTop-schema checkout containing
`extension.xsd` and `3.2/itop_design.xsd`. Then run:

```sh
php tests/run.php
```

On Windows, use the same command with `php.exe` if needed.
No Composer packages, database, or iTop installation are required.
The runner prints each result and exits with `0` on success or `1` on failure.

For every PR targeting `main`, CI sets up PHP 8.3 with DOM and SimpleXML,
downloads both schemas into `.tmp/schemas`, and runs the same command.
The required `PR checks` job also requires this test job to succeed; a schema
download failure fails the job. Push-only runs continue to run Gitleaks only.
Fork PRs targeting `main` use the same PHP test job without project secrets or
write permissions. Repository or organization settings may require maintainer
approval before a fork workflow can start.
For `release/*` PRs, CI also validates the `release/X.Y.Z` branch name against
the manifest and module versions, and includes that result in `PR checks`.

Three module smoke tests in `module.php` execute the real module registration,
check device classes against selectable model types, and verify the XML wiring
of DICOM write checks to their PHP callbacks.

The tests load the two local DICOM PHP classes with minimal iTop substitutes.
They cover classic and DICOMweb endpoint requirements, active-role modality,
port boundaries, self-links, and source/target role compatibility.
Add validation cases to `dicom.php`.

Release preparation tests check matching version updates, formatting preservation,
preservation of compatibility versions, single- and double-quoted module
registrations, and rejection of malformed versions, invalid dates, missing
registrations, and inconsistent metadata.

Two additional tests validate the manifest and data model against the local XSDs.
Missing schemas fail the tests with setup instructions. Tests run offline after
setup; refresh the cached schemas explicitly when needed. Results apply to the
schema versions present locally.

These tests do not test iTop event dispatch, creation-form prefilling, attribute
filters, database uniqueness, persistence, or installation. The substitutes only
exercise the extension's validation callbacks; verify integration in an installed
iTop instance separately.
