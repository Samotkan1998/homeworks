<?php

namespace Documentor\Service;


class JsonRenderer implements RenderInterface
{
    /**
     * Render report data.
     *
     * @param array $data
     * @return string
     */
    public function render(array $data)
    {
        $json = json_encode($data);
        file_put_contents(__DIR__ . '/../../reports/'.time().'.json',$json);
    }
} 