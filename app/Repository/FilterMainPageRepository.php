<?php


namespace App\Repository;


use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use App\Service\Properties;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterMainPageRepository
{
    private $locale;

    public function __construct()
    {
        $this->locale = app()->getLocale();
    }

    public function filter(Request $request)
    {
        $raw = <<<RAW
       factors.id                                                      as factors,
       GROUP_CONCAT(DISTINCT fd.id ORDER BY fd.id)               as diseases,
       GROUP_CONCAT(DISTINCT dp.protocol_id ORDER BY dp.protocol_id) as protocols,
       GROUP_CONCAT(DISTINCT pm.marker_id ORDER BY pm.marker_id)    as markers,
       GROUP_CONCAT(DISTINCT pr.remedy_id ORDER BY pr.remedy_id )   as  remedies
RAW;
        $factor = Factor::selectRaw($raw)
            ->join('factor_diseases as fd', 'factors.id', 'fd.factor_id')
            ->join('disease_protocols as dp', 'fd.disease_id', 'dp.disease_id')
            ->join('protocol_markers as pm', 'dp.protocol_id', 'pm.protocol_id')
            ->join('protocol_remedies as pr', 'dp.protocol_id', 'pr.protocol_id')
            ->when($request->factor, function (Builder $query, $factor) {
                return $query->whereIn('factors.id', $factor);
            })
            ->when($request->disease, function (Builder $query, $disease) {
                return $query->whereIn('dp.disease_id', $disease);
            })
            ->when($request->protocol, function (Builder $query, $protocol) {
                return $query->whereIn('pm.protocol_id', $protocol);
            })
            ->groupBy(['factors.id'])
            ->get();

        return $factor;
    }

    public function getModels($nameModels, $ids)
    {
        if($nameModels == Properties::NAME_PROTOCOLS_MODEL){
            return ProtocolLanguage::whereIn('protocol_id', $ids)->get();
        }
        if($nameModels == Properties::NAME_DISEASE_MODEL){
            return DiseaseLanguage::whereIn('disease_id', $ids)->get();
        }
        if($nameModels == Properties::NAME_FACTOR_MODEL){
            return FactorLanguage::whereIn('factor_id', $ids)->get();
        }
    }
}
