<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;

class FactorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $validatedData = $request->validate([
        'nameEng' => ['required', 'string', 'max:191'],
        'nameRu' => ['required', 'string', 'max:191'],       
        'contentEng' => ['required', 'max:64000'],
        'contentRu' => ['required', 'max:64000'],      
        //'img' => ['nullable'],       
        ]);

        $factorLanguageEng = new FactorLanguage;
        $factorLanguageRu = new FactorLanguage;
        $factor = new Factor;
        //находим наивысшее значение id и ставим больше на 1
        $factor->id = Factor::orderBy('id', 'desc')->first()->id + 1;
        $factor->type_id = 2;
        //dd(\App\Models\Type::count());
        $factor->save();

        if(array_key_exists("diseases", $request->factor)){
            $factor->diseases()->attach($request->factor['diseases']);
        }
        if(array_key_exists("protocols", $request->factor)){
        $factor->protocols()->attach($request->factor['protocols']);
        }
        if(array_key_exists("remedies", $request->factor)){
            $factor->remedies()->attach($request->factor['remedies']);
        }
        if(array_key_exists("markers", $request->factor)){
            $factor->markers()->attach($request->factor['markers']);
        }

        $factorLanguageEng->language = "eng";
        $factorLanguageEng->name = $request['nameEng'];
        $factorLanguageEng->content = $request['contentEng'];
        $factorLanguageEng->factor_id = $factor->id;
        //$factorLanguageEng->type_id = $factor->type_id;

        $factorLanguageRu->language = "ru";
        $factorLanguageRu->name = $request['nameRu'];
        $factorLanguageRu->content = $request['contentRu'];
        $factorLanguageRu->factor_id = $factor->id;
        //$factorLanguageRu->type_id = $factor->type_id;
        
        $factorLanguageEng->save();
        $factorLanguageRu->save();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factor::find($id)->delete();
        return redirect()->back();
    }
}
