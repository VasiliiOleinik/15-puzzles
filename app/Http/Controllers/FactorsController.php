<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
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
        if($request->img != null){          
          $factor->img = $request['img'];
        } 
        $factor->type_id = $request->factor['type_id'];
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

        Artisan::call('cache:clear');

        return Redirect::to('/admin/factorLanguages/');
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
        //dd($request->all());
        $id = FactorLanguage::find($id)->factor_id;
        $factor = Factor::find($id);
        if($request->img != null){          
          $factor->img = $request['img'];
        } 
        $factor->type_id = $request->factor['type_id'];
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

        Cache::forget('factor_eng');
        Cache::forget('factor_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'factorLanguages']);
            }
        }

        return Redirect::to('/admin/factorLanguages/');
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
        return Redirect::to('/admin/factorLanguages/');
    }

    public function setFactorsLanguage($locale)
    {
        Cookie::queue(Cookie::make('locale', $locale, 999));
       // dd(request()->cookie());
        Config::set('app.locale', request()->cookie());
        //dd( Config::get('app.locale') );
        return Redirect::to('/admin/factorLanguages//?locale='.$locale);
    }
}
