<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
 use Illuminate\Validation\Rule; //import Rule class 

class UserController extends Controller
{


    protected function user_edit(Request $request)
    {
        $user = Auth::user();
        //dd($user);
        
        $validatedData = $request->validate([
        'nickname' => ['required', 'string', 'max:255'],
        'first_name' => ['max:255'],
        'middle_name' => ['max:255'],
        'last_name' => ['max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);
        

        //Session::flash('message', 'This is a message!');
        $request->session()->flash('status', 'Task was successful!');
        $user->update($request->all());
        $user->img = $request['img'];

        $user->save();
        //dd($user);
        //Flash::message('Your account has been updated!');

        return redirect('personal_cabinet');
    }
}

