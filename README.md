# SrProjectHelper ILIAS Plugin

srag project helper

This project is licensed under the GPL-3.0-only license

## Requirements

* ILIAS 6.0 - 7.999
* PHP >=7.2

## Installation

Start at your ILIAS root directory

```bash
mkdir -p Customizing/global/plugins/Services/Cron/CronHook
cd Customizing/global/plugins/Services/Cron/CronHook
git clone https://github.com/fluxfw/SrProjectHelper.git SrProjectHelper
```

Update, activate and config the plugin in the ILIAS Plugin Administration

## ILIAS 7 core ilCtrl patch

For make this plugin work with ilCtrl in ILIAS 7, you may need to patch the core, before you update the plugin (At your own risk)

Start at the plugin directory

```shell
./vendor/srag/dic/bin/ilias7_core_apply_ilctrl_patch.sh
```

## Description


