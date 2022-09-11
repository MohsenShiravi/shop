<?php

namespace App\Listeners;

use App\Events\OrderReminder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailReminder
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
     * @param  \App\Events\OrderReminder  $event
     * @return void
     */
    public function handle(OrderReminder $event)
    {
        Log::info('شما یک سفارش پرداخت نشده دارید.لطفا جهت پرداخت یا حذف ان اقدام نمایید.با تشکر');
    }
}
