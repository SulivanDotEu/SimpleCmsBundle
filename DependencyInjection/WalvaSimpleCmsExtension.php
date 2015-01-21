<?php

namespace Walva\SimpleCmsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WalvaSimpleCmsExtension extends Extension
{

	const PARAMS_PREFIX = "walva.cms.";
	const PARAMS_FORM_TYPE = "content_form_type";
	const PARAMS_LIVE_EDITION = "allow_live_edition";
	const PARAMS_BLOCK_SHORTCUT = "shortcut_to_block";

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

	    $container->setParameter(self::PARAMS_PREFIX.self::PARAMS_FORM_TYPE, $config[self::PARAMS_FORM_TYPE]);
	    $container->setParameter(self::PARAMS_PREFIX.self::PARAMS_LIVE_EDITION, $config[self::PARAMS_LIVE_EDITION]);
	    $container->setParameter(self::PARAMS_PREFIX.self::PARAMS_BLOCK_SHORTCUT, $config[self::PARAMS_BLOCK_SHORTCUT]);

    }
}
