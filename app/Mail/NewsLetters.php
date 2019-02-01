<?php

namespace Edenmill\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetters extends Mailable
{
    use Queueable, SerializesModels;
    public $mail;  
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.newsletters',['body'=>$this->body]);
    }
}