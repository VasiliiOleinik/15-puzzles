<?php

namespace App\Http\Controllers;

use App\Models\Police\Police;
use App\Models\Police\PoliceLanguage;

class PoliceController extends Controller
{
    public function show($local = '', $alias = '') {

        $id = Police::where('alias', $alias)->first()->id;
        $polices = PoliceLanguage::where("police_id", '=', $id)->first();

        return view('police.index', compact([
            'polices'
        ]));
    }
}
