<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Twig_Extension;
use Twig_Function;
use Xgc\AsseticsBundle\Exception\InvalidFormatException;
use Xgc\AsseticsBundle\Exception\InvalidResourceException;

/**
 * Class AsseticTwigExtension
 * @package Xgc\Assetic\Twig
 */
final class AsseticTwigExtension extends Twig_Extension
{

    /**
     * @var array
     */
    private $asseticNodes;

    /**
     * AsseticTwigExtension constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws InvalidArgumentException
     */
    public function __construct(ContainerInterface $container)
    {
        $this->asseticNodes = $container->getParameter('xgc.assetic.nodes');
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new Twig_Function('xgc_assetic', [$this, 'includeAssetic'], ['is_safe' => ['html']])
        ];
    }

    /**
     * @param string $key
     *
     * @return string
     * @throws InvalidResourceException
     * @throws InvalidFormatException
     */
    public function includeAssetic(string $key): string
    {
        return $this->getCode($key);
    }

    /**
     * @param string $key
     *
     * @return string
     * @throws InvalidFormatException
     * @throws InvalidResourceException
     */
    private function getCode(string $key): string
    {
        if (!($this->asseticNodes[$key] ?? false)) {
            throw new InvalidResourceException($key);
        }

        $ret = '';

        /** @var string[] $resources */
        $resources = $this->asseticNodes[$key];
        foreach ($resources as $resource) {
            $format = $this->getExtension($resource);

            if ($format === null) {
                $ret .= $this->getCode($resource);
            } else {
                if ($format === 'css') {
                    $ret .= "<link href='$resource'>";
                } elseif ($format === 'js') {
                    $ret .= "<script src='$resource'></script>";
                } else {
                    throw new InvalidFormatException($key);
                }
            }
        }

        return $ret;
    }

    /**
     * @param string $file
     *
     * @return null|string
     */
    private function getExtension(string $file): ?string
    {
        $explodedFile = \explode('.', $file);
        $format = $explodedFile[\count($explodedFile) - 1];

        if (\count($explodedFile) > 1) {
            return $format;
        }

        return null;
    }
}
