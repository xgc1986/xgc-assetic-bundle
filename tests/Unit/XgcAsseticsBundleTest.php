<?php
declare(strict_types=1);

namespace Tests\Unit;

use Xgc\AsseticsBundle\DependencyInjection\XgcAsseticsExtension;
use Xgc\AsseticsBundle\Test\TestCase;
use Xgc\AsseticsBundle\XgcAsseticsBundle;

/**
 * Class XgcAsseticsBundleTest
 * @package Tests\Unit
 */
class XgcAsseticsBundleTest extends TestCase
{
    public function testGetExtension()
    {
        $bundle = new XgcAsseticsBundle();
        self::assertInstanceOf(XgcAsseticsExtension::class, $bundle->getExtension());
    }
}
