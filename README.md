# iTop-br-medicaldevice

Copyright (c) 2024-2026 Björn Rudner
[![License](https://img.shields.io/github/license/rudnerbjoern/iTop-br-medicaldevice)](https://github.com/rudnerbjoern/iTop-br-medicaldevice/blob/main/LICENSE)

## What?

This extension adds structured management for **medical devices** in iTop. It introduces specific classes and attributes to support laboratory and clinical equipment, including model hierarchy and type classification.

- [DICOM Governance and Usage](docs/DICOM.md)

## Core entities

- **MedicalBrand**: Manufacturer / brand (e.g. Siemens, Roche)
- **MedicalModel**: Model name and type (e.g. Centrifuge, Incubator, Analyzer, Medical Imaging Equipment)
- **MedicalDevice**: Individual device instance with standard CMDB relations (location, contacts, contracts, network, etc.)
- **MedicalDicomApplicationEntity**: DICOM AE (Application Entity), including modality/role and technical endpoint data
- **MedicalDicomCommunicationLink**: Governed communication relationship between two DICOM AEs (source/target) with lifecycle status

### Subclasses of `MedicalDevice`

- `MedicalDeviceAnalyser`
- `MedicalDeviceCentrifuge`
- `MedicalDeviceIncubator`
- `MedicalDeviceLiquidHandlingSystem`
- `MedicalDeviceMicroscope`
- `MedicalDeviceMIE`
- `MedicalDevicePOCT`
- `MedicalDeviceRefrigerator`
- `MedicalDeviceSafetyCabinet`
- `MedicalDeviceSamplePreparation`
- `MedicalDeviceTubeSorter`

Each subclass inherits from `ConnectableCI` and supports standard CMDB relationships (location, contracts, contacts, network interfaces, etc.).

## Features

- Separate typologies for **brand** and **model**
- Device-to-model relation
- Optional model filtering based on device class
- DICOM AE documentation for medical imaging equipment (MIE)
- Governed DICOM communication links (source/target, direction, lifecycle status)
- Validation rules for DICOM links (e.g. source != target; basic SCU/SCP role compatibility)
- Full integration with iTop CMDB ecosystem
- Easy extension for additional device types (XML)

## Relations

```mermaid
graph TD

  FCI(FunctionalCI) --> Phys
  Phys(PhysicalDevice) --> Con(ConnectableCI)
  NetInt(NetworkInterface) --> Con
  Con --> Dev(MedicalDevice)
  Brand(MedicalBrand) --> Dev
  Model(MedicalModel) --> Dev
  Loc(Location) --> Phys
  Cont(Contact) --> FCI
  Dev --> MDA(MedicalDeviceAnalyser)
  Dev --> MDLHS(MedicalDeviceLiquidHandlingSystem)
  Dev --> MDPOCT(MedicalDevicePOCT)
  Dev --> MDother(...)
  Dev --> MDMIE(MedicalDeviceMIE)
  DAE(MedicalDicomApplicationEntity) --> MDMIE
  Link(MedicalDicomCommunicationLink)
  DAE --> Link
  Link --> DAE
```

## Installation

This branch requires **iTop 3.3.0 or later**.

| Required module | Minimum version | Used for |
| --- | --- | --- |
| `itop-structure` | 3.3.0 | Organizations, typologies, and documents |
| `itop-config-mgmt` | 3.3.0 | Connectable devices and network interfaces |
| `itop-bridge-cmdb-services` | 3.3.0 | Service and provider contract tabs on medical devices |
| `teemip-ip-mgmt` | 3.3.1 | IP addresses for DICOM application entities |

1. Make TeemIP Core IP Management and this extension available in the iTop `extensions/` directory.
2. Run iTop setup with Configuration Management and either Service Management option to include the CMDB and Services bridge.
3. Select TeemIP IP Management and **Datamodel: Medical Devices**, then complete setup.

## Development

- [Local tests and XML schema validation](tests/README.md)
- [Release preparation and packaging](scripts/README.md)

## Status

This extension is under active development. Feedback and contributions are welcome.

## iTop Compatibility

| iTop version | Extension branch |
| --- | --- |
| 3.3 | Compatibility update in development |
| 3.2 | [itop/3.2][itop-32] |
| 2.7 or 3.1 | [itop/2.7][itop-27] |

[itop-32]: https://github.com/rudnerbjoern/iTop-br-medicaldevice/tree/itop/3.2
[itop-27]: https://github.com/rudnerbjoern/iTop-br-medicaldevice/tree/itop/2.7

The extension was tested on iTop 2.7.10 and 3.2.2

## Attribution

This Extension uses Icons from:

<img src="br-medicaldevice/images/cardiogram.svg" alt="Cardiogram Icon" width="48"/> [Cardiogram Icon](https://iconscout.com/icons/cardiogram) by IconScout Store

<img src="br-medicaldevice/images/test-tube.svg" alt="Test-Tube Icon" width="48"/> [Test-Tube Icon](https://iconscout.com/icons/test-tube) by HJ Project

<img src="br-medicaldevice/images/microscope.svg" alt="Microscope Icon" width="48"/> [Microscope Icon](https://iconscout.com/icons/microscope) by Rank Sol on IconScout

<img src="br-medicaldevice/images/blood-test.png" alt="Blood-Test Icon" width="48"/> [Blood-Test Icon](https://iconscout.com/icons/blood-test) by Surangkana Jomjunyong

<img src="br-medicaldevice/images/blood-tube.png" alt="Blood-Tube Icon" width="48"/> [Blood-Tube Icon](https://iconscout.com/icons/blood-tube) by M. Faisal

<img src="br-medicaldevice/images/vortex-mixer.png" alt="Sample-Preparation Icon" width="48"/> [Sample-Preparation Icon](https://www.vecteezy.com/free-vector/container) by Vecteezy

<img src="br-medicaldevice/images/freezer.png" alt="Freezer Icon" width="48"/> [Freezer Icon](https://iconscout.com/icons/freezer) by Mohit Gandhi

<img src="br-medicaldevice/images/liquid-dropper.png" alt="Liquid Dropper Icon" width="48"/> [Liquid Dropper Icon](https://iconscout.com/icons/liquid-dropper) by Rafiico Creative Studio

<img src="br-medicaldevice/images/biosafety-cabinet.png" alt="Biosafety Cabinet Icon" width="48"/> [Biosafety Cabinet Icon](https://www.freepik.com/icon/biosafety-cabinet_9569504) by Freepik

<img src="br-medicaldevice/images/ct-scan.svg" alt="CT Scanner Icon" width="48"/> [CT Scanner Icon](https://iconscout.com/icons/ct-scan) by Pendimarfuad Adv
