<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class DiseasesController extends Controller
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
    public function create(Request $request)
    {
        $validatedData = $request->validate([
        'nameEng' => ['required', 'string', 'max:191'],
        'nameRu' => ['required', 'string', 'max:191'],       
        'contentEng' => ['required', 'max:64000'],
        'contentRu' => ['required', 'max:64000'],        
        ]);

        $diseaseLanguageEng = new DiseaseLanguage;
        $diseaseLanguageRu = new DiseaseLanguage;
        $disease = new Disease;
        //находим наивысшее значение id и ставим больше на 1
        $disease->id = Disease::orderBy('id', 'desc')->first()->id + 1;
        $disease->save();

        if(array_key_exists("factors", $request->disease)){
            $disease->factors()->sync($request->disease['factors']);
        }
        if(array_key_exists("protocols", $request->disease)){
            $disease->protocols()->sync($request->disease['protocols']);
        }
        if(array_key_exists("remedies", $request->disease)){
            $disease->remedies()->sync($request->disease['remedies']);
        }
        if(array_key_exists("markers", $request->disease)){
            $disease->markers()->sync($request->disease['markers']);
        }
        
        $diseaseLanguageEng->language = "eng";
        $diseaseLanguageEng->name = $request['nameEng'];
        $diseaseLanguageEng->content = $request['contentEng'];
        $diseaseLanguageEng->disease_id = $disease->id;

        $diseaseLanguageRu->language = "ru";
        $diseaseLanguageRu->name = $request['nameRu'];
        $diseaseLanguageRu->content = $request['contentRu'];
        $diseaseLanguageRu->disease_id = $disease->id;
        
        $diseaseLanguageEng->save();
        $diseaseLanguageRu->save();

        //Artisan::call('cache:clear');
        Cache::forget('disease_eng');
        Cache::forget('disease_ru');

        return Redirect::to('/admin/diseaseLanguages/');
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
    public function edit($id, Request $request)
    {
        $id = DiseaseLanguage::find($id)->disease_id;
        $disease = Disease::find($id);

        if(array_key_exists("factors", $request->disease)){
            $disease->factors()->sync($request->disease['factors']);
        }
        if(array_key_exists("protocols", $request->disease)){
        $disease->protocols()->sync($request->disease['protocols']);
        }
        if(array_key_exists("remedies", $request->disease)){
            $disease->remedies()->sync($request->disease['remedies']);
        }
        if(array_key_exists("markers", $request->disease)){
            $disease->markers()->sync($request->disease['markers']);
        }

        Cache::forget('disease_eng');
        Cache::forget('disease_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'diseaseLanguages']);
            }
        }

        return Redirect::to('/admin/diseaseLanguages/');
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
        $id = DiseaseLanguage::find($id)->disease_id;
        Disease::find($id)->delete();
        //Artisan::call('cache:clear');
        Cache::forget('disease_eng');
        Cache::forget('disease_ru');
        return Redirect::to('/admin/diseaseLanguages/');
    }
}
