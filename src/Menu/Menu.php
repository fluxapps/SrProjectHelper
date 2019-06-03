<?php

namespace srag\Plugins\SrProjectHelper\Menu;

use ILIAS\GlobalScreen\Scope\MainMenu\Provider\AbstractStaticPluginMainMenuProvider;
use ilSrProjectHelperPlugin;
use ilUIPluginRouterGUI;
use srag\DIC\SrProjectHelper\DICTrait;
use srag\Plugins\SrProjectHelper\Creator\GitlabClientProject\CreatorGUI as GitlabClientProjectCreatorGUI;
use srag\Plugins\SrProjectHelper\Creator\GitlabPluginProject\CreatorGUI as GitlabPluginProjectCreatorGUI;
use srag\Plugins\SrProjectHelper\Utils\SrProjectHelperTrait;

/**
 * Class Menu
 *
 * @package srag\Plugins\SrProjectHelper\Menu
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @since   ILIAS 5.4
 */
class Menu extends AbstractStaticPluginMainMenuProvider {

	use DICTrait;
	use SrProjectHelperTrait;
	const PLUGIN_CLASS_NAME = ilSrProjectHelperPlugin::class;


	/**
	 * @inheritdoc
	 */
	public function getStaticTopItems(): array {
		return [
			self::dic()->globalScreen()->mainmenu()->topParentItem(self::dic()->globalScreen()->identification()->plugin(self::plugin()
				->getPluginObject(), $this)->identifier(ilSrProjectHelperPlugin::PLUGIN_ID))->withTitle(self::plugin()->translate("menu_title"))
				->withAvailableCallable(function (): bool {
					return self::plugin()->getPluginObject()->isActive();
				})->withVisibilityCallable(function (): bool {
					return self::access()->currentUserHasRole();
				})
		];
	}


	/**
	 * @inheritdoc
	 */
	public function getStaticSubItems(): array {
		$parent = $this->getStaticTopItems()[0];

		return [
			self::dic()->globalScreen()->mainmenu()->link(self::dic()->globalScreen()->identification()->plugin(self::plugin()
				->getPluginObject(), $this)->identifier(ilSrProjectHelperPlugin::PLUGIN_ID . "_create_gitlab_client_project"))
				->withParent($parent->getProviderIdentification())->withTitle(self::plugin()
					->translate("title", GitlabClientProjectCreatorGUI::LANG_MODULE))->withAction(self::dic()->ctrl()->getLinkTargetByClass([
					ilUIPluginRouterGUI::class,
					GitlabClientProjectCreatorGUI::class
				], GitlabClientProjectCreatorGUI::CMD_FORM)),
			self::dic()->globalScreen()->mainmenu()->link(self::dic()->globalScreen()->identification()->plugin(self::plugin()
				->getPluginObject(), $this)->identifier(ilSrProjectHelperPlugin::PLUGIN_ID . "_create_gitlab_plugin_project"))
				->withParent($parent->getProviderIdentification())->withTitle(self::plugin()
					->translate("title", GitlabPluginProjectCreatorGUI::LANG_MODULE))->withAction(self::dic()->ctrl()->getLinkTargetByClass([
					ilUIPluginRouterGUI::class,
					GitlabPluginProjectCreatorGUI::class
				], GitlabPluginProjectCreatorGUI::CMD_FORM))
		];
	}
}