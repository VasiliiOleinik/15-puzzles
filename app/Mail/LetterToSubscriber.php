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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->news = $data;
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
                    ->view('emails.letter-to-subscriber', compact($this->news));
    }
}
