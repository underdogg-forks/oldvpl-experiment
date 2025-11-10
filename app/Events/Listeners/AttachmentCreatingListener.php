<?php

namespace App\Events\Listeners;

use App\Events\AttachmentCreating;

class AttachmentCreatingListener
{
    public function __construct()
    {
        //
    }

    public function handle(AttachmentCreating $event)
    {
        $event->attachment->url_key = str_random(64);
    }
}
