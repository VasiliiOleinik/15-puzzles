<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; //import Rule class
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {       
        $validatedData = $request->validate([
        'nickname' => ['required', 'string', 'max:191', Rule::unique('users')->ignore($user)],
        'first_name' => ['max:191'],
        'middle_name' => ['max:191'],
        'last_name' => ['max:191'],
        'email' => ['required', 'string', 'email', 'max:191', Rule::unique('users')->ignore($user)],
        'password' => ['nullable','regex:/^[a-zA-Z]+$/u','min:8', 'max:191'],
        'img' => ['nullable'],
        ]);

        if($request->password != null){         
          $user->password = Hash::make($request->password);
        }
        if($request->img != null){         
          $user->img = $request['img'];
        }
        $user->update($request->except(['password','img']));        

        $user->save();

        $request->session()->flash('status-user_update', 'You have successfully updated your personal data.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
