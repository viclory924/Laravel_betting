<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredPlayer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Player instance
     *
     * @var $player
     */
    public $player;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Player $player)
    {
        $this->player = $player;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registered-player');
    }
}
