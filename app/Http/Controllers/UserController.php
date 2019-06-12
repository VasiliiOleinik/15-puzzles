<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected function user_edit(Request $request)
    {
        $validatedData = $request->validate([
        'nickname' => ['required', 'string', 'max:255'],
        ]);

        return redirect('personal_cabinet');
    }
}
