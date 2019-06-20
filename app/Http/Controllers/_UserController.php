<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
 use Illuminate\Validation\Rule; //import Rule class 

class _UserController extends Controller
{


    protected function user_edit(Request $request)
    {
        $user = Auth::user();
        //dd($user);
        
        $validatedData = $request->validate([
        'nickname' => ['required','alpha_dash', 'string', 'max:255'],
        'first_name' => ['max:255'],
        'middle_name' => ['max:255'],
        'last_name' => ['max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);
            

        $user->update($request->all());
        $user->img = $request['img'];

        $user->save();

        $request->session()->flash('status-user_update', 'You have successfully updated your personal data.');

        return redirect('personal_cabinet');
    }
}

