<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\File;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_file_by_name = $request['search_file_by_name'];
        if($search_file_by_name){
            $user_files = File::with('user')->where('user_id','=',Auth::id())
                                            ->where('name', 'like', '%'.$search_file_by_name.'%')
                                            ->get();            
        }
        else{
             $user_files = File::with('user')->where('user_id','=',Auth::id())
                                            ->get();
        }
        $user = Auth::user();

        return view('personal_cabinet', compact(['user_files','user','search_file_by_name']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            //'upload_file' => ['mimes:docx,doc,pdf'],
            'file_name' => ['required', 'string', 'alpha_dash', 'max:255'],
            'file_type' => ['required', 'max:255'],
            'file_size' => ['required', 'max:255'],
        ]);    
        
        $file_name = $request['file_name'];
        $file_type = $request['file_type'];
        $file_size = $request['file_size'];
        $file_path = 'files/users_id/'.Auth::id();
        $file_full_name = $file_name.".".$file_type;
        
        

        $file_full_name =  self::checkUniqueFileName($file_path, $file_name, $file_full_name);
        $file_name = explode('.',$file_full_name)[0];

        $request->file('upload_file')->move(public_path( $file_path ), $file_full_name);


        $file = new File;
        $file->name = $file_name;
        $file->path = $file_path;
        $file->type = $file_type;
        $file->size = $file_size;
        $file->user_id =  Auth::id();

        $file->save();

        $user_files = File::with('user')->where('user_id','=',Auth::id())->get();
               

        $request->session()->flash('status-file_upload', 'You have successfully upload your file.');

        $request->file = null;         
        return redirect('personal_cabinet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

         $file = File::findOrFail($request['id']);

         $file_name = $file->name;
         $file_type = $file->type;
         $file_path = $file->path;

         $file->delete();

         $this->removeFileFromFolder($file_name, $file_type, $file_path);

         //return redirect('personal_cabinet');
    }





    public function removeFileFromFolder($file_name, $file_type, $file_path){
        $data= $file_name.".".$file_type;    
        $dir = $file_path."/";    
        $dirHandle = opendir($dir);    
        while ($file = readdir($dirHandle)) {    
            if($file==$data) {
                unlink($dir."/".$file);//give correct path,
            }
        }    
        closedir($dirHandle);
    }

    public function checkUniqueFileName($file_path, $file_name, $file_full_name){

        $files = File::with('user')->get();

        $count = 0;

        while(file_exists( $file_path."/".$file_full_name ))

        foreach($files as $file){
            if($file->name.".".$file->type == $file_full_name){

                $count ++;
                //remove (n)
                if($count > 1){
                    $file_name = substr($file_name, 0, -3);
                }

                //add (n)
                $file_name .= "(".$count.")";

                $file_full_name = $file_name.".".$file->type;
      
                break;
            }
        }

        return $file_full_name;
    }
}
