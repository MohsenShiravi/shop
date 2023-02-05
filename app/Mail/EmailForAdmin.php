<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForAdmin extends Mailable
{
    use Queueable, SerializesModels;
     public $order;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$user)
    {
        $this->order=$order;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $this->subject('پرداخت سفارش')->to('m.shiravi7770@gmail.com')
           ->view('client.mails.mailToAdmin');
    }
}
