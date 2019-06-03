<?php

namespace srag\Plugins\SrProjectHelper\Creator\GitlabPluginProject;

// BackgroundTasks Bug
require_once __DIR__ . "/../../../vendor/autoload.php";

use Gitlab\Model\Project;
use srag\Plugins\SrProjectHelper\Creator\Gitlab\AbstractGitlabCreatorTask;

/**
 * Class CreatorTask
 *
 * @package srag\Plugins\SrProjectHelper\Creator\GitlabPluginProject
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CreatorTask extends AbstractGitlabCreatorTask {

	/**
	 * @inheritdoc
	 */
	protected function getSteps(array $data): array {
		/**
		 * @var Project|null
		 */
		$project = null;

		return $this->getStepsForNewPlugin($data["name"], function () use (&$data): int {
			return intval($data["group"]);
		}, $data["maintainer_user"], $project);
	}
}