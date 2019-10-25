<?php

namespace App\Repository;

use App\Models\Factor\Factor;

class FactorDiagramRepository
{
    public function getProtocolsMarkers($factorsId)
    {
        $raw = 'factors.id as factors, 
        group_concat(distinct dp.protocol_id) as protocols_id, 
        group_concat(distinct dp.protocol_id) as protocols_id,
        group_concat(distinct pm.marker_id) as markers';
        $result = Factor::selectRaw($raw)
            ->join('factor_diseases as fd', 'factors.id', 'fd.factor_id')
            ->join('disease_protocols as dp', 'fd.disease_id', 'dp.disease_id')
            ->join('protocol_language as pl', 'dp.protocol_id', 'pl.protocol_id')
            ->join('protocol_markers as pm', 'dp.protocol_id', 'pm.protocol_id')
            ->join('markers_language as ml', 'pm.marker_id', 'ml.marker_id')
            ->whereIn('factors.id', $factorsId)
            ->where('protocol_language.language', 'ru')
            ->where('markers_language.language', 'ru')
            ->groupBy('fd.factor_id')
            ->get();

        return $result;
    }
}
