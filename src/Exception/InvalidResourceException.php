<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle\Exception;

use RuntimeException;
use Throwable;

/**
 * Class InvalidResourceException
 * @package Xgc\Assetic\Exception
 */
class InvalidResourceException extends RuntimeException
{
    /**
     * InvalidFormatException constructor.
     *
     * @param string         $resource
     * @param int            $code
     * @param Throwable|null $previous
     *
     * @internal param string $format
     */
    public function __construct(string $resource, int $code = 0, Throwable $previous = null)
    {
        parent::__construct("Resouce '$resource' does not exist, add it into xgc_assetics config.", $code, $previous);
    }
}
