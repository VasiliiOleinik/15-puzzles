<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use Auth;

class MedicalHistoryController extends Controller
{
    /**
     * Show the form for creating a new resource. method POST
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
        'headline' => ['required', 'string', 'max:191'],
        'your-story' => ['required'],
        'img-medical-history' => ['nullable'],
        ]);

        $medicalHistory = new MedicalHistory;
        
        if($request['img-medical-history'] != null){
          
          $medicalHistory->img = $request['img-medical-history'];
        }
        //dd($medicalHistory);
        $medicalHistory->title = $request['headline'];
        $medicalHistory->content = $request['your-story'];
        $medicalHistory->user_id = Auth::user()->id;
        $medicalHistory->save();

        $request->session()->flash('status-member_case', 'You have successfully created your medical history.');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberCase  $memberCase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }
}
