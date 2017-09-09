<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Xgc\AsseticsBundle\DependencyInjection\XgcAsseticsExtension;

/**
 * Class XgcAsseticsBundle
 * @package Xgc\AsseticsBundle
 */
class XgcAsseticsBundle extends Bundle
{
    /**
     * @return Extension
     */
    public function getExtension(): Extension
    {
        $this->extension = $this->extension ?? new XgcAsseticsExtension();
        return $this->extension;
    }
}
