<?php


namespace App\Repository;


use App\Models\Country;

class LaboratoryRepository
{
    public function findLaboratory($id, $name)
    {
        $result = Country::join('country_laboratory as cl', 'countries.id', 'cl.country_id')
            ->join('laboratory_methods as lm', 'cl.laboratory_id', 'lm.laboratory_id')
            ->join('method_languages as ml', 'lm.method_id', 'ml.method_id')
            ->where('ml.name', $name)
            ->where('ml.language', app()->getLocale())
            ->where('countries.id', $id)
            ->get();

        return $result;
    }
}
