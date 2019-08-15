<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class QuestionsController extends Controller
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
     * @return \Illuminate\Support\Facades\Redirect;
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
        'titleEng' => ['required', 'string', 'max:191'],
        'titleRu' => ['required', 'string', 'max:191'],
        'contentEng' => ['required', 'max:64000'],
        'contentRu' => ['required', 'max:64000'],            
        ]);
        
        $questionLanguageEng = new QuestionLanguage;
        $questionLanguageRu = new QuestionLanguage;
        $question = new Question;
        //находим наивысшее значение id и ставим больше на 1
        $question->id = Question::orderBy('id', 'desc')->first()->id + 1;
        $question->save();

        $questionLanguageEng->language = "eng";
        $questionLanguageEng->name = $request['titleEng'];
        $questionLanguageEng->content = $request['contentEng'];
        $questionLanguageEng->question_id = $question->id;

        $questionLanguageRu->language = "ru";
        $questionLanguageRu->name = $request['titleRu'];
        $questionLanguageRu->content = $request['contentRu'];
        $questionLanguageRu->question_id = $question->id;
        
        $questionLanguageEng->save();
        $questionLanguageRu->save();

        return Redirect::to('/admin/faq/');
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
        $id = QuestionLanguage::find($id)->question_id;
        Question::find($id)->delete();
        return Redirect::to('/admin/faq/');
    }
}
