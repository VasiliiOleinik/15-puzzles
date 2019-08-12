<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;
use App\Models\Factor\Factor;
use App\Models\Protocol\Protocol;
use App\Models\Remedy;
use App\Models\Marker\Marker;
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

        $this->setRelations($disease->id, $disease, $request);

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

        $this->setRelations($id, $disease, $request);

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

    /**
     * Set model relations
     *
     * @param  int  $id, Disease $model, Request $request
     */
    public function setRelations($id, $model, $request){
        //связи
        if(array_key_exists("factors", $request->disease)){
            $model->factors()->sync($request->disease['factors']);
            $factors = Factor::with('diseases')->whereIn('id',$request->disease['factors'])->get();
            foreach($factors as $factor){
                $factor->diseases()->sync($id);
                if(array_key_exists("protocols", $request->disease)){
                    $factor->protocols()->sync($request->disease['protocols']);
                }
                if(array_key_exists("remedies", $request->disease)){
                    $factor->remedies()->sync($request->disease['remedies']);
                }
                if(array_key_exists("markers", $request->disease)){
                    $factor->markers()->sync($request->disease['markers']);
                }
            }
        }else{
            $model->factors()->sync([]);
        }
        if(array_key_exists("protocols", $request->disease)){
            $model->protocols()->sync($request->disease['protocols']);
            $protocols = Protocol::with('diseases')->whereIn('id',$request->disease['protocols'])->get();
            foreach($protocols as $protocol){
                $protocol->diseases()->sync($id);
                if(array_key_exists("factors", $request->disease)){
                    $protocol->factors()->sync($request->disease['factors']);
                }
                if(array_key_exists("remedies", $request->disease)){
                    $protocol->remedies()->sync($request->disease['remedies']);
                }
                if(array_key_exists("markers", $request->disease)){
                    $protocol->markers()->sync($request->disease['markers']);
                }
            }
        }
        else{
            $model->protocols()->sync([]);
        }
        if(array_key_exists("remedies", $request->disease)){
            $model->remedies()->sync($request->disease['remedies']);
            $remedies = Remedy::with('diseases')->whereIn('id',$request->disease['remedies'])->get();
            foreach($remedies as $remedy){
                $remedy->diseases()->sync($id);
                if(array_key_exists("factors", $request->disease)){
                    $remedy->factors()->sync($request->disease['factors']);
                }
                if(array_key_exists("protocols", $request->disease)){
                    $remedy->protocols()->sync($request->disease['protocols']);
                }
            }
        }else{
            $model->remedies()->sync([]);
        }
        if(array_key_exists("markers", $request->disease)){
            $model->markers()->sync($request->disease['markers']);
            $markers = Marker::with('diseases')->whereIn('id',$request->disease['markers'])->get();
            foreach($markers as $marker){
                $marker->diseases()->sync($id);
                if(array_key_exists("factors", $request->disease)){
                    $marker->factors()->sync($request->disease['factors']);
                }
                if(array_key_exists("protocols", $request->disease)){
                    $marker->protocols()->sync($request->disease['protocols']);
                }
            }
        }else{
            $model->markers()->sync([]);
        }
    }
}
