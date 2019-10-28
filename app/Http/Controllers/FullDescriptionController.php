<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Laboratory\Laboratory;
use App\Models\Marker\Marker;
use App\Models\Marker\MarkerLanguage;
use App\Models\MethodLanguage;
use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use App\Models\Type;
use App\Models\TypesLanguage;
use Illuminate\Http\Request;
use App\Models\Factor\Factor;

class FullDescriptionController extends Controller
{
    const PROTOCOL_NAME = 'protocol';
    const NORMAL_CONDITION_NAME = 'normal_condition';
    const ABNORMAL_CONDITION_NAME = 'abnormal_condition';
    const METHODS_NAME = 'methods';

    public function show(Request $request)
    {
        if ($request->option == self::PROTOCOL_NAME) {
            $protocol = $this->showFullProtocol($request->id);
            return view('factor-diagram.full', [
                'name' => $protocol->protocolLanguages->name,
                'content' => $protocol->protocolLanguages->content
            ]);
        }
        if ($request->option == self::NORMAL_CONDITION_NAME) {
            $condition = $this->showFullCondition($request->id);
            return view('factor-diagram.full', [
                'name' => $condition->factorLanguage->name,
                'content' => $condition->factorLanguage->normal_condition
            ]);
        }
        if ($request->option == self::ABNORMAL_CONDITION_NAME) {
            $condition = $this->showFullCondition($request->id);
            return view('factor-diagram.full', [
                'name' => $condition->factorLanguage->name,
                'content' => $condition->factorLanguage->abnormal_condition,

            ]);
        }
        if ($request->option == self::METHODS_NAME) {
            $countries = Country::all();
            $laboratories = Laboratory::all();
            $methods = MethodLanguage::with('method')->get();
            $marker = $this->showFullMethods($request->id);
            $x = $marker->methods;
            foreach ($x as $r){
                $s = $r->methodLang;
            }
            return view('factor-diagram.methods', [
                'marker' => $marker,
//                'methods' => $methods,
//                'countries' => $countries,
//                'laboratories' => $laboratories
            ]);
        }
    }

    public function showFullProtocol($id)
    {
        return Protocol::find($id);
    }

    public function showFullCondition($id)
    {
        $condition = Factor::find($id)->first();
        return $condition;
    }

    public function showFullMethods($id)
    {
        return Marker::with('markerLanguage')
            ->where('id', $id)
            ->first();

    }
}
