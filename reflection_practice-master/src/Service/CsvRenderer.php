<?php

namespace Documentor\Service;

class CsvRenderer implements RenderInterface
{
    /**
     * Render report data.
     *
     * @param array $data
     * @return string
     */
    public function render(array $data)
    {
        $csvFileName = __DIR__ . '/../../reports/'.time().'.csv';
        $res = array();
        $arr1 = [$data['class_name'], $data['class_data']['author'], $data['class_data']['copyright']];
        $res[0] = $arr1;

        foreach($data['methods'] as $item)
        {
            $temp = [];
            array_push($temp, $item['name']);
            foreach($item['arguments'] as $arg) {
                array_push($temp, $arg['name'] . ':' . $arg['type']);
            }
            array_push($temp, $item['return_type']);
            array_push($res, $temp);
        }

        $fp = fopen($csvFileName, 'w');

        foreach($res as $row){
            //Write the row to the CSV file.
            fputcsv($fp, $row);
        }

        fclose($fp);
    }
}