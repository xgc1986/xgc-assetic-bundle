<?php
declare(strict_types=1);

namespace Tests\Unit\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractContainerBuilderTestCase;
use Xgc\AsseticsBundle\DependencyInjection\XgcAsseticsExtension;
use Xgc\AsseticsBundle\Test\TestCaseTrait;

/**
 * Class XgcAsseticsExtensionTest
 *
 * @package Tests\Unit\DependencyInjection
 */
class XgcAsseticsExtensionTest extends AbstractContainerBuilderTestCase
{
    use TestCaseTrait;

    public function testLoadExtension()
    {
        $extension = new XgcAsseticsExtension();
        $extension->load([], $this->container);

        self::pass();
    }
}
