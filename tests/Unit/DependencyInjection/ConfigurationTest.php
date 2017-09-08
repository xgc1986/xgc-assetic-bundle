<?php
declare(strict_types=1);

namespace Tests\Unit\DependencyInjection;

use Xgc\AsseticsBundle\DependencyInjection\Configuration;
use Xgc\AsseticsBundle\Test\TestCase;

/**
 * Class Configuration
 * @package Tests\Unit\DependencyInjection
 */
class ConfigurationTest extends TestCase
{
    /**
     * @dataProvider dataTestConfiguration
     *
     * @param array $inputConfig
     * @param array $expectedConfig
     */
    public function testConfiguration($inputConfig, $expectedConfig)
    {
        $inputConfig = $inputConfig['xgc_assetics'];

        $configuration = new Configuration();

        $node             = $configuration->getConfigTreeBuilder()
                                          ->buildTree();
        $normalizedConfig = $node->normalize($inputConfig);
        $finalizedConfig  = $node->finalize($normalizedConfig);

        self::assertSame($expectedConfig, $finalizedConfig);
    }

    /**
     * @return array
     */
    public function dataTestConfiguration(): array
    {
        return
            [
                [
                    [
                        'xgc_assetics' => [
                            'bootstrap4_full' => [
                                'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js',
                                'bootstrap4'
                            ],
                            'bootstrap4'      => [
                                'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'
                            ]
                        ]
                    ],
                    [
                        'bootstrap4_full' => [
                            'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js',
                            'bootstrap4'
                        ],
                        'bootstrap4'      => [
                            'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'
                        ]
                    ]
                ]
            ];
    }
}
