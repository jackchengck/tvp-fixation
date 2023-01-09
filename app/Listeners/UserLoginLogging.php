<?php

namespace App\Listeners;

use App\Models\UserLoginLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UserLoginLogging
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
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        //
//        dd($event);
        $loginLog = new UserLoginLog();

        $loginLog->user_id = $event->user->id;
        $loginLog->business_id = $event->user->business->id;

        $loginLog->save();
    }
}
