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
* Classical endpoint uniqueness is based on organization, IP address, port and protocol

## MedicalDicomCommunicationLink

### Concept

A **MedicalDicomCommunicationLink** documents a governed DICOM communication relationship between two AEs.

It represents intended communication and governance, not runtime traffic.

### Creating a Communication Link

Navigate to:

> Medical Devices → DICOM → DICOM Communication Links

Define the following attributes:

| Attribute    | Description                                         |
| ------------ | --------------------------------------------------- |
| Organization | Governance scope                                    |
| Source AE    | Sending or initiating AE                            |
| Target AE    | Receiving AE                                        |
| Direction    | PUSH, PULL, or BIDIR                                |
| Status       | planned, approved, production, deprecated, obsolete |
| Description  | Optional clinical or technical notes                |

### Direction Semantics

| Direction | Interpretation                    |
| --------- | --------------------------------- |
| PUSH      | Source sends data to target       |
| PULL      | Source retrieves data from target |
| BIDIR     | Bidirectional communication       |

### Governance Rules

The following validations are enforced:

1. Source and target must not be identical
2. Source AE must not be SCP-only
3. Target AE must not be SCU-only
4. Only one identical link per organization, source, target, and direction

These rules apply to all write paths (UI, CSV import, REST API, synchronization).

## Lifecycle Management

### Status Attribute

The lifecycle status supports governance and change management:

| Status     | Meaning                       |
| ---------- | ----------------------------- |
| planned    | Intended but not yet approved |
| approved   | Approved for implementation   |
| production | Active clinical use           |
| deprecated | Planned for removal           |
| obsolete   | No longer valid               |

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
