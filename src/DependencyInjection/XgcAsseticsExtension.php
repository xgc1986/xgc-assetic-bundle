<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle\DependencyInjection;

use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * Class XgcAsseticsExtension
 *
 * @package Xgc\AsseticsBundle\DependencyInjection
 */
class XgcAsseticsExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $container->setParameter('xgc.assetic.nodes', $config);
    }
}
