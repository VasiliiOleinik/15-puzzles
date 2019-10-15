<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionLanguage;
use App\Models\User\User;
use Illuminate\Support\Facades\Cache;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LetterToEditor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FaqFormRequest;
use Lang;

class FaqController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Cache::remember('question_'.app()->getLocale(), now()->addDay(1), function(){
                return QuestionLanguage::with('question')->where('language', app()->getLocale())->get();
        });
        $user = Auth::user();
        return view('faq.faq', compact(['questions', 'user']));
    }

    /**
     * Sends letter to editor.
     *
     * @param  \Illuminate\Http\Request $request
     * @return redirect
     */
    public function letter(FaqFormRequest $request)
    {
        //dd(Lang::get('faq.phone_required'));
        Mail::to( config('puzzles.options.admin_email') )->send(new LetterToEditor($request));
        //return redirect()->back();
        return response()->json([
            'letter_status' => trans('faq.letter_has_sent')
        ]);
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

        Cache::forget('question_eng');
        Cache::forget('question_ru');

        return Redirect::to('/admin/faq/');
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
        Cache::forget('question_eng');
        Cache::forget('question_ru');
        return Redirect::to('/admin/faq/');
    }
}
