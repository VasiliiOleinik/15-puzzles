<?php


namespace App\Repository;


use App\Http\Admin\Factor;

class FilterMainPageRepository
{
    private $locale;
    public function __construct()
    {
        $this->locale = app()->getLocale();
    }

    public function filterByFactor(array $ids): array
    {
        $ids = implode(',', $ids);
        $result = \DB::select("
SELECT max(fl.id)                                                    factor,
       GROUP_CONCAT(DISTINCT fd.id ORDER BY fd.id)                   fd_deases,
       GROUP_CONCAT(DISTINCT dl.id ORDER BY dl.id)                   deases,
       GROUP_CONCAT(DISTINCT dp.protocol_id ORDER BY dp.protocol_id) protocol,
       GROUP_CONCAT(DISTINCT pm.marker_id ORDER BY pm.marker_id)     marker,
       GROUP_CONCAT(DISTINCT pr.remedy_id ORDER BY pr.remedy_id)     remedy
FROM factors f
         join factor_languages fl on f.id = fl.factor_id and fl.language = '".$this->locale."'
         join factor_diseases fd on f.id = fd.factor_id
         join disease_languages dl on fd.disease_id = dl.disease_id and dl.language = '".$this->locale."'
         join disease_protocols dp
              on fd.disease_id = dp.disease_id
         join protocol_markers pm on dp.protocol_id = pm.protocol_id
         join protocol_remedies pr on dp.protocol_id = pr.protocol_id
WHERE f.id in ($ids)
GROUP BY f.id");

        return $result;
    }

    public function filterByDiseases(array $ids): array
    {

    }

    public function filterByProtocol(array $ids): array
    {

    }
}
