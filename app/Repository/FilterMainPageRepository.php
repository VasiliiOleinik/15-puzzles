<?php


namespace App\Repository;


use App\Models\Factor\Factor;

class FilterMainPageRepository
{
    private $locale;

    public function __construct()
    {
        $this->locale = app()->getLocale();
    }

    public function filterByFactor(): array
    {
//        $ids = implode(',', $ids);
//        $result =
//
//        return $result;
        $raw = <<<RAW
       factors.id                                                      as id,
       GROUP_CONCAT(DISTINCT fd.id ORDER BY fd.id)               as fd_disease,
       GROUP_CONCAT(DISTINCT dp.protocol_id ORDER BY dp.protocol_id) as protocols,
       GROUP_CONCAT(DISTINCT pm.marker_id ORDER BY pm.marker_id)    as markers,
       GROUP_CONCAT(DISTINCT pr.remedy_id ORDER BY pr.remedy_id )   as  remedy
RAW;
//        $factor = Factor::selectRaw($raw)
//            ->join('factor_diseases as fd', 'factors.id', 'fd.factor_id')
//            ->join('disease_protocols as dp', 'fd.disease_id', 'dp.disease_id')
//            ->join('protocol_markers as pm', 'dp.protocol_id', ' pm.protocol_id')
//            ->join('protocol_remedies as pr', 'dp.protocol_id', ' pr.protocol_id')
//            ->when($request->factors, function (Builder $query, $status) {
//                return $query->where('status', $status);
//            })


    }

    public function filterByDiseases(array $ids): array
    {

    }

    public function filterByProtocol(array $ids): array
    {

    }
}
