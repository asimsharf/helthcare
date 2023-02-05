<?php

namespace App\Listeners;

use App\Events\UserCreated;

class UserCreatedListener
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
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // From here we can implement the logic 
        dd("User Created, Name: " . $event->user->name);
    }
}
