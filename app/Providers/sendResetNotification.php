<?php

namespace App\Providers;

use App\Providers\ResetPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendResetNotification
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
     * @param  \App\Providers\ResetPassword  $event
     * @return void
     */
    public function handle(ResetPassword $event)
    {
        //
    }
}
