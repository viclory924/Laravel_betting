<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestNewPassword extends Mailable
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
    public function __construct(\App\Player $player, $random_password)
    {
        $player->new_password = $random_password;
        $this->player = $player;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request-new-password');
    }
}
