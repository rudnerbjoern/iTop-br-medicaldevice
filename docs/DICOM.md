# Using DICOM Elements in iTop

## Purpose and Scope

The DICOM elements in this extension are designed to document and govern **DICOM-based communication** in clinical and laboratory environments.

They allow you to:

- Explicitly document **DICOM Application Entities (AE)**
- Define and govern **DICOM communication paths** between systems
- Enforce **basic DICOM governance rules** (roles, endpoints, uniqueness)

This extension does **not** perform DICOM communication itself.

## MedicalDicomApplicationEntity (DICOM AE)

### Concept

A **MedicalDicomApplicationEntity** represents a logical DICOM endpoint, identified by:

- AE Title
- Network endpoint (IP address and port)
- DICOM role (SCU / SCP / BOTH)
- Optional modality
- Optional link to medical imaging equipment and technical host

### Creating a DICOM AE

Navigate to:

> Medical Devices → DICOM → DICOM AE

Mandatory and recommended attributes:

| Attribute                 | Description                                  |
| ------------------------- | -------------------------------------------- |
| AE Title                  | Unique DICOM AE identifier (1–16 characters) |
| Organization              | Owning organization (governance scope)       |
| Role                      | SCP, SCU, or BOTH                            |
| IP Address                | Required for SCU / BOTH                      |
| Port                      | Required for SCU / BOTH                      |
| Modality                  | Recommended for SCU / BOTH                   |
| Medical Imaging Equipment | Optional link to a physical device           |
| Functional CI             | Technical host (server or VM)                |

### Role Semantics

| Role | Meaning                           |
| ---- | --------------------------------- |
| SCP  | Service Class Provider (receiver) |
| SCU  | Service Class User (sender)       |
| BOTH | Acts as both SCU and SCP          |

Governance rules enforced:

- SCU and BOTH require IP address and port
- AE Title must be unique per organization
- IP + port must be unique per organization

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

## Example Modeling Pattern

CT Scanner communicating with PACS

1. Create DICOM AE for CT (Role: SCU, Modality: CT)
2. Create DICOM AE for PACS (Role: SCP)
3. Create Communication Link:
   - Source: CT AE
   - Target: PACS AE
   - Direction: PUSH
   - Status: production

## Best Practices

- Model one AE per logical endpoint
- Use BOTH only when technically justified
- Always assign an organization
- Prefer deprecating links over deleting them
- Use descriptions for clinical context

## Limitations

This model does not:

- Monitor live DICOM traffic
- Validate DICOM protocol conformance
- Perform automatic discovery

It is a CMDB and governance model only.
