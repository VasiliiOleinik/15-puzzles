<?php


namespace App\Service;


class PazzlesService
{
    const COUNT_CHUNK = 4;
    public function chunkCollect($typeFactors)
    {
        foreach ($typeFactors as $typeFactor){
            $nameFactor = strtolower($typeFactor->groupEng->name);
            $result[$nameFactor]['nameTypeLang'] = $typeFactor->groupLanguage->name;
            $result[$nameFactor][] = $typeFactor->factors->chunk(self::COUNT_CHUNK)->all();
        }
        return $result;
    }
}
