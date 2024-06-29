<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class PublicEmail extends Mailable
{

    public $content;
    public $sub;
    public $bladeName;
    public $replyyTo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $sub, $bladeName, $replyyTo = '')
    {
        $this->content      = $content;
        $this->sub          = $sub;
        $this->bladeName    = $bladeName;
        $this->replyyTo      = $replyyTo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->replyTo);
        return $this->subject($this->sub)
        ->replyTo($this->replyyTo)
        ->from("no-reply@certificate.dimensionsgroup.sa")
        ->markdown('emails.' . $this->bladeName)
        ->with('details', $this->content);

    }

    public function failed($exception)
    {
        \Log::error($exception);
        // etc...
        \Log::info("public email");
    }
}
