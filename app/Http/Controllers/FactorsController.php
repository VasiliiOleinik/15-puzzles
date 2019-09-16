<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
use App\Models\Remedy;
use App\Models\Marker\Marker;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

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
    public function create(Request $request)
    {

        $validatedData = $request->validate([
        'nameEng' => ['required', 'string', 'max:191'],
        'nameRu' => ['required', 'string', 'max:191'],       
        'contentEng' => ['required', 'max:64000'],
        'contentRu' => ['required', 'max:64000'],      
        'img' => ['nullable'],       
        ]);

        $factorLanguageEng = new FactorLanguage;
        $factorLanguageRu = new FactorLanguage;
        $factor = new Factor;
        //находим наивысшее значение id и ставим больше на 1
        $factor->id = Factor::orderBy('id', 'desc')->first()->id + 1;
        $factor->name = $request['nameEng'];
        if($request->img != null){          
          $factor->img = $request['img'];
        } 
        $factor->type_id = $request->factor['type_id'];        
        $factor->save();

        $this->setRelations($factor->id, $factor, $request);

        $factorLanguageEng->language = "eng";
        $factorLanguageEng->name = $request['nameEng'];
        $factorLanguageEng->content = $request['contentEng'];
        $factorLanguageEng->factor_id = $factor->id;

        $factorLanguageRu->language = "ru";
        $factorLanguageRu->name = $request['nameRu'];
        $factorLanguageRu->content = $request['contentRu'];
        $factorLanguageRu->factor_id = $factor->id;
        
        $factorLanguageEng->save();
        $factorLanguageRu->save();

        Cache::forget('factor_eng');
        Cache::forget('factor_ru');

        return Redirect::to('/admin/factors/');
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
     * @param  int  $id, Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $id = FactorLanguage::find($id)->factor_id;
        $factor = Factor::find($id);
        if($request->img != null){          
          $factor->img = $request['img'];
        } 
        $factor->type_id = $request->factor['type_id'];
        $factor->save();

        $this->setRelations($id, $factor, $request);

        Cache::forget('factor_eng');
        Cache::forget('factor_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'factors']);
            }
        }

        return Redirect::to('/admin/factors/');
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
        $id = FactorLanguage::find($id)->factor_id;
        Factor::find($id)->delete();
        //Artisan::call('cache:clear');
        Cache::forget('factor_eng');
        Cache::forget('factor_ru');
        return Redirect::to('/admin/factorLanguages/');
    }

    /**
     * Set model relations
     *
     * @param  int  $id, Factor $model, Request $request
     */
    public function setRelations($id, $model, $request){
        //связи
        if(array_key_exists("diseases", $request->factor)){
            $model->diseases()->sync($request->factor['diseases']);
            $diseases = Disease::with('factors')->whereIn('id',$request->factor['diseases'])->get();
            foreach($diseases as $disease){
                $disease->factors()->sync($id);
                if(array_key_exists("protocols", $request->factor)){
                    $disease->protocols()->sync($request->factor['protocols']);
                }
                if(array_key_exists("remedies", $request->factor)){
                    $disease->remedies()->sync($request->factor['remedies']);
                }
                if(array_key_exists("markers", $request->factor)){
                    $disease->markers()->sync($request->factor['markers']);
                }
            }
        }else{
            $model->diseases()->sync([]);
        }
        if(array_key_exists("protocols", $request->factor)){
            $model->protocols()->sync($request->factor['protocols']);
            $protocols = Protocol::with('factors')->whereIn('id',$request->factor['protocols'])->get();
            foreach($protocols as $protocol){
                $protocol->factors()->sync($id);
                if(array_key_exists("diseases", $request->factor)){
                    $protocol->diseases()->sync($request->factor['diseases']);
                }
                if(array_key_exists("remedies", $request->factor)){
                    $protocol->remedies()->sync($request->factor['remedies']);
                }
                if(array_key_exists("markers", $request->factor)){
                    $protocol->markers()->sync($request->factor['markers']);
                }
            }
        }
        else{
            $model->protocols()->sync([]);
        }
        if(array_key_exists("remedies", $request->factor)){
            $model->remedies()->sync($request->factor['remedies']);
            $remedies = Remedy::with('factors')->whereIn('id',$request->factor['remedies'])->get();
            foreach($remedies as $remedy){
                $remedy->factors()->sync($id);
                if(array_key_exists("diseases", $request->factor)){
                    $remedy->diseases()->sync($request->factor['diseases']);
                }
                if(array_key_exists("protocols", $request->factor)){
                    $remedy->protocols()->sync($request->factor['protocols']);
                }
            }
        }else{
            $model->remedies()->sync([]);
        }
        if(array_key_exists("markers", $request->factor)){
            $model->markers()->sync($request->factor['markers']);
            $markers = Marker::with('factors')->whereIn('id',$request->factor['markers'])->get();
            foreach($markers as $marker){
                $marker->factors()->sync($id);
                if(array_key_exists("diseases", $request->factor)){
                    $marker->diseases()->sync($request->factor['diseases']);
                }
                if(array_key_exists("protocols", $request->factor)){
                    $marker->protocols()->sync($request->factor['protocols']);
                }
            }
        }else{
            $model->markers()->sync([]);
        }
    }
}
