# iTop-br-medicaldevice

Copyright (c) 2024-2025 Björn Rudner
[![License](https://img.shields.io/github/license/rudnerbjoern/iTop-br-medicaldevice)](https://github.com/rudnerbjoern/iTop-br-medicaldevice/blob/main/LICENSE)

## What?

This extension adds structured management for **medical devices** in iTop. It introduces specific classes and attributes to support laboratory and clinical equipment, including model hierarchy and type classification.

### Core entities

- **MedicalBrand**: Manufacturer or brand (e.g. Siemens, Roche)
- **MedicalModel**: Model name and type (e.g. Centrifuge, Incubator, Analyser, Medical Imaging Equipment)
- **MedicalDevice**: Individual device instance with location, status, and technical identifiers

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
- Full integration with iTop CMDB ecosystem
- Easy extension for additional device types (via XML)

## Relations

```mermaid
graph TD

  FCI(FunctionalCI) --> Phys
  Phys(PhysicalDevice) --> Con(ConnectableCI)
  NetInt(NetWorkInterface) --> Con
  Con --> Dev(MedicalDevice)
  Brand(MedicalBrand) --> Dev
  Model(MedicalModel) --> Dev
  Loc(Location) --> Phys
  Cont(Contact) --> FCI
  Dev --> MDA(MedicalDeviceAnalyser)
  Dev --> MDLHS(MedicalDeviceLiquidHandlingSystem)
  Dev --> MDPOCT(MedicalDevicePOCT)
  Dev --> MDMIE(MedicalDeviceMIE)
  Dev --> MDother(...)
```

## Installation

Place this extension in the `extensions` folder of your iTop installation and run the setup again. Be sure to enable the extension during setup.

## Status

This extension is under active development. Feedback and contributions are welcome.

## iTop Compatibility

The branch [2.7](https://github.com/rudnerbjoern/iTop-br-medicaldevice/tree/itop/2.7) is compatible to iTop 2.7 and iTop 3.1.

The branch [main](https://github.com/rudnerbjoern/iTop-br-medicaldevice/tree/main) will only be compatible to iTop 3.1 and above.

Versions starting with 2.7.x are kept compatible to iTop 2.7

The extension was tested on iTop 2.7.10 and 3.2.1

## Attribution

This Extension uses Icons from:

![Cardiogram Icon](br-medicaldevice/images/cardiogram.png) [Cardiogram Icon](https://iconscout.com/icons/cardiogram) by IconScout Store

![Test-Tube Icon](br-medicaldevice/images/test-tube.png) [Test-Tube Icon](https://iconscout.com/icons/test-tube) by HJ Project

![Microscope Icon](br-medicaldevice/images/microscope.png) [Microscope Icon](https://iconscout.com/icons/microscope) by Rank Sol on IconScout

![Blood-Test Icon](br-medicaldevice/images/blood-test.png) [Blood-Test Icon](https://iconscout.com/icons/blood-test) by Surangkana Jomjunyong

![Blood-Tube Icon](br-medicaldevice/images/blood-tube.png) [Blood-Tube Icon](https://iconscout.com/icons/blood-tube) by M. Faisal

![Sample-Preparation Icon](br-medicaldevice/images/vortex-mixer.png) [Sample-Preparation Icon](https://www.vecteezy.com/free-vector/container) by Vecteezy

![Medical Icon](br-medicaldevice/images//medical.png) [Medical Icon](https://iconscout.com/icons/medical) by Jemis Mali

![Freezer Icon](br-medicaldevice/images/freezer.png) [Freezer Icon](https://iconscout.com/icons/freezer) by Mohit Gandhi

![Liquid Dropper Icon](br-medicaldevice/images/liquid-dropper.png) [Liquid Dropper Icon](https://iconscout.com/icons/liquid-dropper) by Rafiico Creative Studio

![Biosafety Cabinet Icon](br-medicaldevice/images/biosafety-cabinet.png) [Biosafety Cabinet Icon](https://www.freepik.com/icon/biosafety-cabinet_9569504) by Freepik

![CT Scanner Icon](br-medicaldevice/images/ct-scan.png) [CT Scanner Icon](https://iconscout.com/icons/ct-scan) by Pendimarfuad Adv
