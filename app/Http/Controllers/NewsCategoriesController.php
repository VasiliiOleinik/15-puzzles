<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category\CategoryForNews;
use App\Models\Category\CategoryForNewsLanguage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class NewsCategoriesController extends Controller
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
     * @param  Request $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function create(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
        'nameEng' => ['required', 'string', 'max:191'],
        'nameRu' => ['required', 'string', 'max:191'],        
        ]);
        
        $categoryLanguageEng = new CategoryForNewsLanguage;
        $categoryLanguageRu = new CategoryForNewsLanguage;
        $category = new CategoryForNews;
        //находим наивысшее значение id и ставим больше на 1
        $category->id = CategoryForNews::orderBy('id', 'desc')->first()->id + 1;
        $category->name = $request['nameEng'];
        $category->save();

        $categoryLanguageEng->language = "eng";
        $categoryLanguageEng->name = $request['nameEng'];
        $categoryLanguageEng->category_for_news_id = $category->id;

        $categoryLanguageRu->language = "ru";
        $categoryLanguageRu->name = $request['nameRu'];
        $categoryLanguageRu->category_for_news_id = $category->id;
        
        $categoryLanguageEng->save();
        $categoryLanguageRu->save();
                                                    
        return Redirect::to('/admin/news_categories/');
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
        $id = CategoryForNewsLanguage::find($id)->category_for_news_id;
        CategoryForNews::find($id)->delete();
        return Redirect::to('/admin/news_categories/');
    }
}
