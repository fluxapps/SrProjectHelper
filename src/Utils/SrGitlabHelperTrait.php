<?php

namespace srag\Plugins\SrGitlabHelper\Utils;

use Gitlab\Client;
use srag\Plugins\SrGitlabHelper\Access\Access;
use srag\Plugins\SrGitlabHelper\Access\Ilias;
use srag\Plugins\SrGitlabHelper\Gitlab\GitlabApi;

/**
 * Trait SrGitlabHelperTrait
 *
 * @package srag\Plugins\SrGitlabHelper\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait SrGitlabHelperTrait {

	/**
	 * @return Access
	 */
	protected static function access(): Access {
		return Access::getInstance();
	}


	/**
	 * @return Client
	 */
	protected static function gitlab(): Client {
		return GitlabApi::getClient();
	}


	/**
	 * @return Ilias
	 */
	protected static function ilias(): Ilias {
		return Ilias::getInstance();
	}
}
