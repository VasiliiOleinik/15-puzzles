<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Method;
use App\Models\MethodLanguage;
use Illuminate\Support\Facades\Redirect;

class MethodsController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
        'nameEng' => ['required', 'string', 'max:191'],
        'nameRu' => ['required', 'string', 'max:191'],
        'contentEng' => ['required', 'max:64000'],
        'contentRu' => ['required', 'max:64000'],          
        ]);
        
        $methodLanguageEng = new MethodLanguage;
        $methodLanguageRu = new MethodLanguage;
        $method = new Method;
        //находим наивысшее значение id и ставим больше на 1
        $method->id = Method::orderBy('id', 'desc')->first()->id + 1;
        $method->name = $request['nameEng'];
        $method->save();

        $methodLanguageEng->language = "eng";
        $methodLanguageEng->name = $request['nameEng'];
        $methodLanguageEng->content = $request['contentEng'];
        $methodLanguageEng->method_id = $method->id;

        $methodLanguageRu->language = "ru";
        $methodLanguageRu->name = $request['nameRu'];
        $methodLanguageRu->content = $request['contentRu'];
        $methodLanguageRu->method_id = $method->id;
        
        $methodLanguageEng->save();
        $methodLanguageRu->save();

        return Redirect::to('/admin/methods/');
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
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function destroy($id)
    {
        $id = MethodLanguage::find($id)->method_id;
        Method::find($id)->delete();
        return Redirect::to('/admin/methods/');
    }
}
