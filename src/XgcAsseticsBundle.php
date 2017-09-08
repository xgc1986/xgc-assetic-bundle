<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Xgc\AsseticsBundle\DependencyInjection\XgcAsseticsExtension;

/**
 * Class XgcAsseticsBundle
 * @package Xgc\AsseticsBundle
 */
class XgcAsseticsBundle extends Bundle
{
    /**
     * @return XgcAsseticsExtension
     */
    public function getExtension()
    {
        $this->extension = $this->extension ?? new XgcAsseticsExtension();
        return $this->extension;
    }
}
