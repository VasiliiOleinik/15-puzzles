<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {       
        $validatedData = $request->validate([
            'email-subscribe' => ['required', 'string', 'email', 'max:191'],
        ]);
        //проверяем подписан ли уже этот email
        if(Subscriber::where('email','=',$request['email-subscribe'])->count() == 0){
            $subscriber = new Subscriber;        
            $subscriber->email = $request['email-subscribe'];
            $subscriber->save();

            $request->session()->flash('status-member_case', 'You have successfully subscribed.');
        }else{
            $request->session()->flash('status-member_case', 'You are already subscribed.');            
        }
        return redirect()->back();
    }
}
