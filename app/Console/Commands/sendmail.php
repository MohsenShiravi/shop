<?php

namespace App\Console\Commands;

use App\Events\OrderReminder;
use App\Models\Order;
use Illuminate\Console\Command;

class sendmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '
Sending an email to a user who has not paid the order for a week';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {$day=\Illuminate\Support\Carbon::now()->subDay(7);
        Order::query()->where('user_id',auth()->id())
            ->where('transaction_id',null)
            ->where('updated_at',"<=",$day)->get();
        event(new OrderReminder());
    }
}
