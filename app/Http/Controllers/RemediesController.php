<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remedy;
use App\Models\Factor\Factor;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
use App\Models\Marker\Marker;
use App\Models\RemedyLanguage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class RemediesController extends Controller
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

        $remedyLanguageEng = new RemedyLanguage;
        $remedyLanguageRu = new RemedyLanguage;
        $remedy = new Remedy;
        //находим наивысшее значение id и ставим больше на 1
        $remedy->id = Remedy::orderBy('id', 'desc')->first()->id + 1;
        $remedy->url = $request->remedy['url'];        
        $remedy->save();
        
        $remedyLanguageEng->language = "eng";
        $remedyLanguageEng->name = $request['nameEng'];
        $remedyLanguageEng->content = $request['contentEng'];
        $remedyLanguageEng->remedy_id = $remedy->id;

        $remedyLanguageRu->language = "ru";
        $remedyLanguageRu->name = $request['nameRu'];
        $remedyLanguageRu->content = $request['contentRu'];
        $remedyLanguageRu->remedy_id = $remedy->id;
        
        $remedyLanguageEng->save();
        $remedyLanguageRu->save();

        //Artisan::call('cache:clear');
        Cache::forget('remedy_eng');
        Cache::forget('remedy_ru');

        return Redirect::to('/admin/remedyLanguages/');
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
        $id = remedyLanguage::find($id)->remedy_id;
        $remedy = Remedy::find($id);
        $remedy->url = $request->remedy['url'];
        $remedy->save();

        Cache::forget('remedy_eng');
        Cache::forget('remedy_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'remedyLanguages']);
            }
        }

        return Redirect::to('/admin/remedyLanguages/');
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
        $id = RemedyLanguage::find($id)->remedy_id;
        Remedy::find($id)->delete();
        //Artisan::call('cache:clear');
        Cache::forget('remedy_eng');
        Cache::forget('remedy_ru');
        return Redirect::to('/admin/remedyLanguages/');
    }
}
