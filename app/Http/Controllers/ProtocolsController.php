<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factor\Factor;
use App\Models\Disease\Disease;
use App\Models\Remedy;
use App\Models\Marker\Marker;

use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;

class ProtocolsController extends Controller
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

        $protocolLanguageEng = new ProtocolLanguage;
        $protocolLanguageRu = new ProtocolLanguage;
        $protocol = new Protocol;
        //находим наивысшее значение id и ставим больше на 1
        $protocol->id = Protocol::orderBy('id', 'desc')->first()->id + 1;

        $protocol->evidence_id = $request->protocol['evidence_id'];
        $protocol->save();

        if(array_key_exists("factors", $request->protocol)){
            $protocol->factors()->sync($request->protocol['factors']);
            Protocol::factors()->sync($request->protocol['factors']);
        }
        if(array_key_exists("diseases", $request->protocol)){
            $protocol->diseases()->sync($request->protocol['diseases']);
        }
        if(array_key_exists("remedies", $request->protocol)){
            $protocol->remedies()->sync($request->protocol['remedies']);
        }
        if(array_key_exists("markers", $request->protocol)){
            $protocol->markers()->sync($request->protocol['markers']);
        }

        $protocolLanguageEng->language = "eng";
        $protocolLanguageEng->name = $request['nameEng'];
        $protocolLanguageEng->content = $request['contentEng'];
        $protocolLanguageEng->protocol_id = $protocol->id;
        //$protocolLanguageEng->type_id = $protocol->type_id;

        $protocolLanguageRu->language = "ru";
        $protocolLanguageRu->name = $request['nameRu'];
        $protocolLanguageRu->content = $request['contentRu'];
        $protocolLanguageRu->protocol_id = $protocol->id;
        //$protocolLanguageRu->type_id = $protocol->type_id;
        
        $protocolLanguageEng->save();
        $protocolLanguageRu->save();

        //Artisan::call('cache:clear');
        Cache::forget('protocol_eng');
        Cache::forget('protocol_ru');

        return Redirect::to('/admin/protocolLanguages/');
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
        $id = ProtocolLanguage::find($id)->protocol_id;
        $protocol = Protocol::find($id);
        $protocol->evidence_id = $request->protocol['evidence_id'];
        $protocol->save();

        if(array_key_exists("factors", $request->protocol)){
            $protocol->factors()->sync($request->protocol['factors']);
        }
        if(array_key_exists("diseases", $request->protocol)){
            $protocol->diseases()->sync($request->protocol['diseases']);
        }
        if(array_key_exists("remedies", $request->protocol)){
            $protocol->remedies()->sync($request->protocol['remedies']);
        }
        if(array_key_exists("markers", $request->protocol)){
            $protocol->markers()->sync($request->protocol['markers']);
        }

        Cache::forget('protocol_eng');
        Cache::forget('protocol_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'protocolLanguages']);
            }
        }

        return Redirect::to('/admin/protocolLanguages/');
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
        $id = ProtocolLanguage::find($id)->protocol_id;
        Protocol::find($id)->delete();
        Cache::forget('protocol_eng');
        Cache::forget('protocol_ru');
        return Redirect::to('/admin/protocolLanguages/');
    }
}
