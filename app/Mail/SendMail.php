<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function  __construct($user)
    {
        $this->user = $user;
//
//        dd($this->user);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('payment@blueplanet.com.mm')
            ->subject('Payment Confimation Delivery Email Testing')
            ->view('email.email');
//            ->text('mails.demo_plain')
//            ->attach(public_path('/photo').'/1550560087.jpg', [
//                'as' => '1550560087.jpg',
//                'mime' => 'image/jpeg',
//            ]);

    }
}
