<?php

namespace App\Events\Listeners;

use App\Events\UserDeleted;

class UserDeletedListener
{
    public function __construct()
    {
        //
    }

    public function handle(UserDeleted $event)
    {
        $event->user->custom()->delete();
    }
}
