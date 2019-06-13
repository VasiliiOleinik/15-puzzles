<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Article\Article;
use Illuminate\Http\Request;

class PersonalCabinetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

     public function personal_cabinet(Request $request)
    {
    //$request->session()->reflash();
        $test = "test";

        return view('personal_cabinet', compact(['test']));
    }

     public function upload(Request $request)
    {
               
        $uniqueFileName = uniqid() . $request['upload_file']->getClientOriginalName();

        $request->file('upload_file')->move(public_path('files/users_id/'.Auth::id()),$uniqueFileName);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
