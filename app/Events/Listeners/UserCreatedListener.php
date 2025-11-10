<?php

namespace App\Events\Listeners;

use App\Events\UserCreated;
use Modules\CustomFields\Models\UserCustom;

class UserCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(UserCreated $event)
    {
        // Create the default custom record.
        $event->user->custom()->save(new UserCustom());
    }
}
