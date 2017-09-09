<?php
declare(strict_types=1);

namespace Xgc\AsseticsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Twig_Extension;
use Twig_Function;
use Xgc\AsseticsBundle\Exception\InvalidResourceException;

/**
 * Class AsseticTwigExtension
 *
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
     */
    public function includeAssetic(string $key): string
    {
        return $this->getCode($key);
    }

    /**
     * @param string $key
     *
     * @return string
     * @throws InvalidResourceException
     */
    private function getCode(string $key): string
    {
        $this->checkResource($key);

        $ret = '';

        /** @var string[] $resources */
        $resources = $this->asseticNodes[$key];
        foreach ($resources as $resource) {
            $format = $this->getExtension($resource);

            switch ($format) {
                case 'css':
                    $ret .= "<link href='$resource'>";
                    break;
                case 'js':
                    $ret .= "<script src='$resource'></script>";
                    break;
                default:
                    $ret .= $this->getCode($resource);
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
        $format       = $explodedFile[\count($explodedFile) - 1];

        return (\count($explodedFile) > 1) ? $format : null;
    }

    /**
     * @param string $key
     *
     * @throws InvalidResourceException
     */
    private function checkResource(string $key)
    {
        if (!($this->asseticNodes[$key] ?? false)) {
            throw new InvalidResourceException($key);
        }
    }
}
