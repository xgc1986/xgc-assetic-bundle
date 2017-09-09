<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle\Test;

/**
 * Trait TestCaseTrait
 *
 * @package Xgc\AsseticsBundle\Test
 *
 * @method static assertTrue(bool $value)
 */
trait TestCaseTrait
{
    public static function pass(): void
    {
        self::assertTrue(true);
    }
}
