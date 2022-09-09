<?php

namespace App\Listeners;

use App\Events\OrderTransaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderTransaction  $event
     * @return void
     */
    public function handle(OrderTransaction $event)
    {
        Log::info('پرداخت کاربر با موفقیت انجام شد');
    }
}
