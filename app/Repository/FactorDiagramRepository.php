<?php

namespace App\Repository;

use App\Models\Factor\Factor;

class FactorDiagramRepository
{
    public function getProtocolsMarkers($factorsId)
    {
        $local = app()->getLocale();
        $raw = "select factors.id                                   as factor,
       group_concat(distinct fl.name)               as factor_name,
       group_concat(distinct dp.protocol_id)        as protocols_id,
       group_concat(distinct pl.name)               as protocols_name,
       group_concat(distinct pm.marker_id)          as markers_id,
       group_concat(distinct ml.name)               as markers_name,
       group_concat(distinct fl.normal_condition)   as normal_condition,
       group_concat(distinct fl.abnormal_condition) as abnormal_condition,
       group_concat(distinct tl.name)               as group_factor
from `factors`
         inner join `factor_diseases` as `fd` on `factors`.`id` = `fd`.`factor_id`
         inner join `factor_languages` as `fl` on `factors`.`id` = `fl`.`factor_id`
         inner join `factor_types` as `ft` on `factors`.`id` = `ft`.`factor_id`
         inner join `types_languages` as `tl` on `ft`.`type_id` = `tl`.`type_id`
         inner join `disease_protocols` as `dp` on `fd`.`disease_id` = `dp`.`disease_id`
         inner join `protocol_languages` as `pl` on `dp`.`protocol_id` = `pl`.`protocol_id`
         left join `protocol_markers` as `pm` on `dp`.`protocol_id` = `pm`.`protocol_id`
         left join `marker_languages` as `ml` on `pm`.`marker_id` = `ml`.`marker_id`
    and `pm`.`marker_id` is not null
    and `ml`.`marker_id` is not null
    and `ml`.`language` = '$local'
where `factors`.`id` in ($factorsId)
  and `pl`.`language` = '$local'
  and `fl`.`language` = '$local'
  and `tl`.`language` = '$local'
group by `factors`.`id`";

        $result = \DB::select($raw);
        return $result;
    }
}
