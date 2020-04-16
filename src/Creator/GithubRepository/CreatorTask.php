<?php

namespace srag\Plugins\SrProjectHelper\Creator\GithubRepository;

require_once __DIR__ . "/../../../vendor/autoload.php";

use srag\Plugins\SrProjectHelper\Creator\Github\AbstractGithubCreatorTask;

/**
 * Class CreatorTask
 *
 * @package srag\Plugins\SrProjectHelper\Creator\GithubRepository
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CreatorTask extends AbstractGithubCreatorTask
{

    /**
     * @inheritDoc
     */
    protected function getSteps(array $data) : array
    {
        return array_merge([
            function () use (&$data)/*: void*/ {
                self::srProjectHelper()->github()->createRepository($data["name"]);
            }
        ], (!empty($data["project"]) ? [
            function () use (&$data)/*: void*/ {
                self::srProjectHelper()->gitlab()->setGitlabGithubSync($data["project"], $data["name"]);
            }
        ] : []));
    }


    /**
     * @inheritDoc
     */
    protected function getOutput2() : string
    {
        return "";
    }
}
