<?php

namespace App\Listeners;

use App\Events\OrderTransaction;
use App\Mail\EmailForAdmin;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailToAdmin
{
    public $order;
    public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($order,$user)
    {
        $this->order=$order;
        $this->user=$user;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderTransaction  $event
     * @return void
     */
    public function handle(OrderTransaction $event)
    {
        MAIL::send(new EmailForAdmin($event->order,$event->user));
    }
}
