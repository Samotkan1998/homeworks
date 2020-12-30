<?php


namespace Documentor\Factory;

use Documentor\Service\JsonRenderer;
use Documentor\Service\RenderInterface;
use Documentor\Service\CsvRenderer;
use Documentor\Service\TwigRender;

class RendererFactory
{
    public static function create(string $renderer): RenderInterface
    {
        switch ($renderer) {
            case RenderInterface::HTML_RENDER:
                return self::configureTwigRenderer();
            case RenderInterface::JSON_RENDER:
                return new JsonRenderer();
            case RenderInterface::CSV_RENDER:
                return new CsvRenderer();
        }
    }

    private function configureTwigRenderer()
    {
        $twigRender = new TwigRender(
            __DIR__.'/../../templates/',
            __DIR__.'/../../reports/'
        );

        return $twigRender;
    }
}