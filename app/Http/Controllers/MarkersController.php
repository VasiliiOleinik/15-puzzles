<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker\Marker;
use App\Models\Marker\MarkerLanguage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class MarkersController extends Controller
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

        $markerLanguageEng = new MarkerLanguage;
        $markerLanguageRu = new MarkerLanguage;
        $marker = new Marker;
        //находим наивысшее значение id и ставим больше на 1
        $marker->id = Marker::orderBy('id', 'desc')->first()->id + 1;
        $marker->name = $request['nameEng'];
        $marker->save();
        
        $markerLanguageEng->language = "eng";
        $markerLanguageEng->name = $request['nameEng'];
        $markerLanguageEng->content = $request['contentEng'];
        $markerLanguageEng->marker_id = $marker->id;

        $markerLanguageRu->language = "ru";
        $markerLanguageRu->name = $request['nameRu'];
        $markerLanguageRu->content = $request['contentRu'];
        $markerLanguageRu->marker_id = $marker->id;
        
        $markerLanguageEng->save();
        $markerLanguageRu->save();

        //Artisan::call('cache:clear');
        Cache::forget('marker_eng');
        Cache::forget('marker_ru');

        return Redirect::to('/admin/markerLanguages/');
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
        $id = markerLanguage::find($id)->marker_id;
        $marker = Marker::find($id);

        Cache::forget('marker_eng');
        Cache::forget('marker_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'markerLanguages']);
            }
        }

        return Redirect::to('/admin/markerLanguages/');
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
        $id = MarkerLanguage::find($id)->marker_id;
        Marker::find($id)->delete();
        //Artisan::call('cache:clear');
        Cache::forget('marker_eng');
        Cache::forget('marker_ru');
        return Redirect::to('/admin/markerLanguages/');
    }
}
