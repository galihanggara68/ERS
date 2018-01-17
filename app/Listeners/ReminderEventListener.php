<?php

namespace App\Listeners;

use App\Events\ReminderEvent, App\Mail\ReminderMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class ReminderEventListener
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
     * @param  ReminderEvent  $event
     * @return void
     */
    public function handle(ReminderEvent $event)
    {
        //Dependency injection from ReminderEvent
        $user = $event->user;
        $reminder = $event->reminder;
        
        //Data which is send to user email later
        $detail = [
            'id' => $user->id,
            'email' => $user->email,
            'code' => $reminder->code
        ];

        // Send queued mail to user
        Mail::to($user->email)->queue(new ReminderMailable($detail));
    }
}
