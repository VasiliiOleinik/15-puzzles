<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Laboratory\Laboratory;
use App\Models\Marker\MarkerLanguage;
use App\Models\MethodLanguage;
use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use App\Models\TypesLanguage;
use Illuminate\Http\Request;

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
                'name' => $protocol->name,
                'content' => $protocol->content
            ]);
        }
        if ($request->option == self::NORMAL_CONDITION_NAME) {
            $condition = $this->showFullCondition($request->id);
            return view('factor-diagram.full', [
                'name' => $condition->name,
                'content' => $condition->normal_condition
            ]);
        }
        if ($request->option == self::ABNORMAL_CONDITION_NAME) {
            $condition = $this->showFullCondition($request->id);
            return view('factor-diagram.full', [
                'name' => $condition->name,
                'content' => $condition->abnormal_condition,

            ]);
        }
        if ($request->option == self::METHODS_NAME) {
            $countries = Country::all();
            $laboratories = Laboratory::all();
            $methods = MethodLanguage::with('method')->get();
            $marker = $this->showFullMethods($request->id);
            return view('factor-diagram.methods', [
                'marker' => $marker,
                'methods' => $methods,
                'countries' => $countries,
                'laboratories' => $laboratories
            ]);
        }
    }

    public function showFullProtocol($id)
    {
        return ProtocolLanguage::find($id);
    }

    public function showFullCondition($id)
    {
        $condition = TypesLanguage::find($id);
        return $condition;
    }

    public function showFullMethods($id)
    {
        return MarkerLanguage::with('marker.methods.methodLanguage')
            ->where('id', $id)
            ->first();

    }
}
