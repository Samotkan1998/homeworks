<?php


namespace Documentor\Service;


interface RenderInterface
{
    public const HTML_RENDER = 'html';
    public const JSON_RENDER = 'json';
    public const CSV_RENDER = 'csv';
    /**
     * Render report data.
     *
     * @param array $data
     * @return string
     */
    public function render(array $data);
}