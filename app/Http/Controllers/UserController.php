<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User\User;
use Illuminate\Http\Request;
 use Illuminate\Validation\Rule; //import Rule class 

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
