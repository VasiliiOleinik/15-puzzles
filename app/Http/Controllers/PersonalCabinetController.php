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
       

        $validatedData = $request->validate([
            'upload_file' => ['mimes:docx,doc,pdf'],
            'file_name' => ['required', 'string', 'alpha_dash', 'max:255'],
        ]);
        /*if ($request['upload_file']->getClientMimeType() !== 'application/pdf')
        {
            dd($request['upload_file']->getClientMimeType());
            //respond not validated, invalid file type.
        }*/
        //dd($validatedData);

        $uniqueFileName = uniqid() . $request['upload_file']->getClientOriginalName();

        $request->file('upload_file')->move(public_path('files/users_id/'.Auth::id()),$uniqueFileName);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
