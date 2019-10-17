<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class LetterToSubscriber extends Mailable
{
    use Queueable, SerializesModels;

    public $news;
    public $language;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $language)
    {
        $this->news = $data;
        $this->language = $language;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        //dd(app()->getLocale());
        return $this->subject(__('subscriber.subject'))
                    ->view('emails.letter-to-subscriber')->with([$this->news, $this->language]);
    }
}
