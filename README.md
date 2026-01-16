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

Place this extension in the `extensions` folder of your iTop installation and run the setup again. Be sure to enable the extension during setup.

## Status

This extension is under active development. Feedback and contributions are welcome.

## iTop Compatibility

The branch [2.7](https://github.com/rudnerbjoern/iTop-br-medicaldevice/tree/itop/2.7) is compatible to iTop 2.7 and iTop 3.1.

The branch [main](https://github.com/rudnerbjoern/iTop-br-medicaldevice/tree/main) will only be compatible to iTop 3.2 and above.

Versions starting with 2.7.x are kept compatible to iTop 2.7

The extension was tested on iTop 2.7.10 and 3.2.2

## Attribution

This Extension uses Icons from:

![Cardiogram Icon](br-medicaldevice/images/cardiogram.svg){width=48} [Cardiogram Icon](https://iconscout.com/icons/cardiogram) by IconScout Store

![Test-Tube Icon](br-medicaldevice/images/test-tube.svg){width=48} [Test-Tube Icon](https://iconscout.com/icons/test-tube) by HJ Project

![Microscope Icon](br-medicaldevice/images/microscope.svg){width=48} [Microscope Icon](https://iconscout.com/icons/microscope) by Rank Sol on IconScout

![Blood-Test Icon](br-medicaldevice/images/blood-test.png){width=48} [Blood-Test Icon](https://iconscout.com/icons/blood-test) by Surangkana Jomjunyong

![Blood-Tube Icon](br-medicaldevice/images/blood-tube.png){width=48} [Blood-Tube Icon](https://iconscout.com/icons/blood-tube) by M. Faisal

![Sample-Preparation Icon](br-medicaldevice/images/vortex-mixer.png){width=48} [Sample-Preparation Icon](https://www.vecteezy.com/free-vector/container) by Vecteezy

![Freezer Icon](br-medicaldevice/images/freezer.png){width=48} [Freezer Icon](https://iconscout.com/icons/freezer) by Mohit Gandhi

![Liquid Dropper Icon](br-medicaldevice/images/liquid-dropper.png){width=48} [Liquid Dropper Icon](https://iconscout.com/icons/liquid-dropper) by Rafiico Creative Studio

![Biosafety Cabinet Icon](br-medicaldevice/images/biosafety-cabinet.png){width=48} [Biosafety Cabinet Icon](https://www.freepik.com/icon/biosafety-cabinet_9569504) by Freepik

![CT Scanner Icon](br-medicaldevice/images/ct-scan.svg){width=48} [CT Scanner Icon](https://iconscout.com/icons/ct-scan) by Pendimarfuad Adv
