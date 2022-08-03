<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use NotificationChannels\Telegram\Telegram; 
use Dominik\Config\Models\ConfigMessage;

class SendTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Telegram:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mes = DB::table('config_messages')->join('config_users', 'config_users.user', '=', 'config_messages.sender')->select('config_users.token', 'config_messages.id', 'config_messages.message','config_messages.receiver', 'config_messages.time')
        ->where("config_messages.status", 2)->get();
        $now = time();
        $currentTime = Carbon::now();
        foreach ($mes as $item) {
            $date = strtotime((string)$item->time);
            if($date-$now <= 0)
            {
                $updates = new Telegram(token:$item->token);
                $updates->sendMessage(['text' => $item->message, "chat_id" => $item->receiver]);

                ConfigMessage::where('id', $item->id)->update(['time' => $currentTime, 'status' => 1]);
            }
        }
    }
}
