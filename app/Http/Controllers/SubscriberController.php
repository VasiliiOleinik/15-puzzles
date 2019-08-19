<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\LetterToSubscriber;
use Illuminate\Support\Facades\Cache;
use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;

class SubscriberController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $locale)
    {        
        $validatedData = $request->validate([
            'email-subscribe' => ['required', 'string', 'email', 'max:191'],
        ]);
        $newsLatest = Cache::remember('newsLatest_'.app()->getLocale(), now()->addDay(1), function(){
                $latest = Article::orderBy('id','desc')->paginate(3)->pluck('id');
                return ArticleLanguage::with('article')->whereIn('article_id',$latest)
                                                       ->orderBy('article_id','desc')->paginate(3);
        });
        //проверяем подписан ли уже этот email
        if(Subscriber::where('email','=',$request['email-subscribe'])->count() == 0){
            $subscriber = new Subscriber;        
            $subscriber->email = $request['email-subscribe'];
            $subscriber->language = $locale;
            $subscriber->save();
            
            Mail::to( $subscriber->email )
                ->send( new LetterToSubscriber($newsLatest) );
            
            $request->session()->flash('status-subscriber', 'You have successfully subscribed.');
        }else{
            $request->session()->flash('status-subscriber', 'You are already subscribed.');            
        }
        return redirect()->back();
    }
}
