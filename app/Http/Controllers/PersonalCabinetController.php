<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\File;
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
            //'upload_file' => ['mimes:docx,doc,pdf'],
            'file_name' => ['required', 'string', 'alpha_dash', 'max:255'],
            'file_type' => ['required', 'max:255'],
            'file_size' => ['required', 'max:255'],
        ]);    

        $user_id = Auth::id();
        $file_name = $request['file_name'];
        $file_type = $request['file_type'];
        $file_size = $request['file_size'];
        $file_path = 'files/users_id/'.Auth::id();
        $file_full_name = $file_name.".".$file_type;
        $user_files = File::where('user_id','=',Auth::id())->get();

        //checkUniqueFileName($file_full_name, $user_files, 1);
        

        //$uniqueFileName = uniqid() . $request['upload_file']->getClientOriginalName();
        $request->file('upload_file')->move(public_path( $file_path ), $file_full_name);




        $file = new File;
        $file->name = $file_name;
        $file->path = $file_path
        $file->type = $file_type;
        $file->size = $file_size;
        $file->user_id =  $user_id;

        $file->save();

        
       

        //dd($files);



        $request->session()->flash('status-file_upload', 'You have successfully upload your file.');

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function checkUniqueFileName($file_full_name, $user_files, $count){

        /*foreach($user_files as $user_file){

            $user_file_full_name = $user_file->name.".".$user_file->type;

            if($user_file_full_name == $file_full_name){

                $file_full_name += "(".$count.")";
                $count ++;

                checkUniqueFileName($file_full_name, $user_files, $count);
            }
        }*/
    }
}
