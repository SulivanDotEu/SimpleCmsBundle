<?php

namespace Walva\SimpleCmsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder
	        ->root('walva_simple_cms')
	            ->children()
	                ->scalarNode('content_form_type')->defaultValue("text")->end()
	                ->scalarNode('allow_live_edition')->defaultFalse()->end()
	                ->scalarNode('shortcut_to_block')->defaultFalse()->end()
	            ->end()
	        ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
