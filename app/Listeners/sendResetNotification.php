<?php

namespace App\Listeners;

use App\Events\ResetPassword;
use App\Mail\RestPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
     * @param  \App\Events\ResetPassword  $event
     * @return void
     */
    public function handle(ResetPassword $event)
    {
        Mail::to('anujkumarpathak1007@gmail.com')->send(new RestPassword());
        dd($event->userId);
    }
}
