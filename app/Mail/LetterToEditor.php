<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LetterToEditor extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $phone;
    public $name;
    public $letter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email = $data['email'];
        $this->letter = $data['letter'];
        $this->phone = $data['phone'];
        $this->name = $data['name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->view('emails.letter-to-editor')
                    ->with(['letter', $this->letter,
                            'email', $this->email,
                            'phone', $this->phone,
                            'name', $this->name]);;
    }
}
