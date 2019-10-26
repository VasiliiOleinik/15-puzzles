<?php


namespace App\Service;


class HelperService
{
    public static function uniqFilteredData($filteredData)
    {
        $dataArr = array();
        foreach ($filteredData as $item) {
            $item->protocols_id = explode(',', $item->protocols_id);
            $item->protocols_name = explode(',', $item->protocols_name);
            $item->markers_id = isset($item->markers_id) ? explode(',', $item->markers_id) : false;
            $item->markers_name = isset($item->markers_name) ? explode(',', $item->markers_name) : false;
            $item->group_factor = explode(',', $item->group_factor);
        }
        return $filteredData;
    }
}
