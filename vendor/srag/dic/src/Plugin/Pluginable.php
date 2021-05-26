<?php

namespace srag\DIC\SrProjectHelper\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\SrProjectHelper\Plugin
 */
interface Pluginable
{

    /**
     * @return PluginInterface
     */
    public function getPlugin() : PluginInterface;


    /**
     * @param PluginInterface $plugin
     *
     * @return static
     */
    public function withPlugin(PluginInterface $plugin)/*: static*/ ;
}
