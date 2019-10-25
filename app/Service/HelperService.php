<?php


namespace App\Service;


class HelperService
{
    public static function uniqFilteredData($filteredData, $arrayKeys): array
    {
        $dataArr = array();
        foreach ($arrayKeys as $item) {
            $data = implode(',', $filteredData->pluck($item)->all());
            $data = $data != '' ? explode(',', $data) : false;
            $dataArr[$item] = $data ? array_unique($data) : false;
        }
        return $dataArr;
    }
}
