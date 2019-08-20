<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\TagLanguage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class TagsController extends Controller
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
        $validatedData = $request->validate([
        'nameEng' => ['required', 'string', 'max:191'],
        'nameRu' => ['required', 'string', 'max:191'],        
        ]);
        
        $tagLanguageEng = new TagLanguage;
        $tagLanguageRu = new TagLanguage;
        $tag = new Tag;
        //находим наивысшее значение id и ставим больше на 1
        $tag->id = Tag::orderBy('id', 'desc')->first()->id + 1;
        $tag->save();

        $tagLanguageEng->language = "eng";
        $tagLanguageEng->name = $request['nameEng'];
        $tagLanguageEng->tag_id = $tag->id;

        $tagLanguageRu->language = "ru";
        $tagLanguageRu->name = $request['nameRu'];
        $tagLanguageRu->tag_id = $tag->id;
        
        $tagLanguageEng->save();
        $tagLanguageRu->save();
                                                    
        return Redirect::to('/admin/tags/');
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
        $id = TagLanguage::find($id)->tag_id;
        Tag::find($id)->delete();
        return Redirect::to('/admin/tags/');
    }
}
