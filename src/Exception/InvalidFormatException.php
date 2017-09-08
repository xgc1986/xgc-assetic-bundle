<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle\Exception;

use RuntimeException;
use Throwable;

/**
 * Class InvalidFormatException
 * @package Xgc\Assetic\Exception
 */
class InvalidFormatException extends RuntimeException
{
    /**
     * InvalidFormatException constructor.
     *
     * @param string         $format
     * @param Throwable|null $previous
     */
    public function __construct(string $format, Throwable $previous = null)
    {
        parent::__construct("Invalid resource format: '$format'.", 10001, $previous);
    }
}
