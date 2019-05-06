<?php

namespace srag\Plugins\SrGitlabHelper\Config;

use ilMultiSelectInputGUI;
use ilNumberInputGUI;
use ilSrGitlabHelperPlugin;
use ilTextInputGUI;
use srag\ActiveRecordConfig\SrGitlabHelper\ActiveRecordConfigFormGUI;
use srag\Plugins\SrGitlabHelper\Utils\SrGitlabHelperTrait;

/**
 * Class ConfigFormGUI
 *
 * @package srag\Plugins\SrGitlabHelper\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ConfigFormGUI extends ActiveRecordConfigFormGUI {

	use SrGitlabHelperTrait;
	const PLUGIN_CLASS_NAME = ilSrGitlabHelperPlugin::class;
	const CONFIG_CLASS_NAME = Config::class;


	/**
	 * @inheritdoc
	 */
	protected function getValue(/*string*/
		$key) {
		switch ($key) {
			default:
				return parent::getValue($key);
		}
	}


	/**
	 * @inheritdoc
	 */
	protected function initFields()/*: void*/ {
		$this->fields = [
			Config::KEY_GITLAB_URL => [
				self::PROPERTY_CLASS => ilTextInputGUI::class,
				self::PROPERTY_REQUIRED => true
			],
			Config::KEY_GITLAB_ACCESS_TOKEN => [
				self::PROPERTY_CLASS => ilTextInputGUI::class,
				self::PROPERTY_REQUIRED => true
			],
			Config::KEY_GITLAB_CLIENTS_GROUP_ID => [
				self::PROPERTY_CLASS => ilNumberInputGUI::class,
				self::PROPERTY_REQUIRED => true
			],
			Config::KEY_GITLAB_ILIAS_REPO_ID => [
				self::PROPERTY_CLASS => ilNumberInputGUI::class,
				self::PROPERTY_REQUIRED => true
			],
			Config::KEY_GITLAB_PLUGINS_GROUP_ID => [
				self::PROPERTY_CLASS => ilNumberInputGUI::class,
				self::PROPERTY_REQUIRED => true
			],
			Config::KEY_ROLES => [
				self::PROPERTY_CLASS => ilMultiSelectInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				self::PROPERTY_OPTIONS => self::ilias()->roles()->getAllRoles(),
				"enableSelectAll" => true
			]
		];
	}


	/**
	 * @inheritdoc
	 */
	protected function storeValue(/*string*/
		$key, $value)/*: void*/ {
		switch ($key) {
			case Config::KEY_ROLES:
				if ($value[0] === "") {
					array_shift($value);
				}

				$value = array_map(function (string $role_id): int {
					return intval($role_id);
				}, $value);
				break;

			default:
				break;
		}

		parent::storeValue($key, $value);
	}
}
