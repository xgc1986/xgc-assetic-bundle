<?php
declare(strict_types=1);

/**
 * @codingStandardsIgnoreFile
 */

namespace Tests\Unit\Twig;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractContainerBuilderTestCase;
use Xgc\AsseticsBundle\Twig\AsseticTwigExtension;

/**
 * Class AsseticTwigExtensionTest
 * @package Xgc\AsseticsBundle\Twig
 */
final class AsseticTwigExtensionTest extends AbstractContainerBuilderTestCase
{

    public function testGetFunction()
    {
        $this->container->setParameter('xgc.assetic.nodes', [
            'bootstrap4_full' => [
                'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js',
                'bootstrap4'
            ],
            'bootstrap4'      => [
                'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'
            ],
            'bad_format' => [
                'wrong.jpg'
            ],
            'bad_key' => [
                'asd'
            ]
        ]);
        $extension = new AsseticTwigExtension($this->container);
        self::assertCount(1, $extension->getFunctions());

        self::assertSame(
            "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>",
            $extension->includeAssetic('bootstrap4_full')
        );
    }

    /**
     * @expectedException \Xgc\AsseticsBundle\Exception\InvalidFormatException
     */
    public function testBadFormat()
    {
        $this->container->setParameter('xgc.assetic.nodes', [
            'bad_format' => [
                'wrong.jpg'
            ]
        ]);
        $extension = new AsseticTwigExtension($this->container);
        $extension->includeAssetic('bad_format');
    }

    /**
     * @expectedException \Xgc\AsseticsBundle\Exception\InvalidResourceException
     */
    public function testBadResource()
    {
        $this->container->setParameter('xgc.assetic.nodes', [
            'bad_key' => [
                'asd'
            ]
        ]);
        $extension = new AsseticTwigExtension($this->container);
        $extension->includeAssetic('bad_key');
    }
}
