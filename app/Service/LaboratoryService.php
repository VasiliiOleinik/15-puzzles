<?php


namespace App\Service;


class LaboratoryService
{
    public function getValidResponseArray($resultFiltered)
    {
        $result = array();
        foreach ($resultFiltered as $item) {
            $tmp['id'] = $item->laboratory_id;
            $tmp['lat'] = $item->lat;
            $tmp['lng'] = $item->lng;
            $result['laboratories'][] = $tmp;
        }
        return $result;
    }
}
