<?php

namespace App\Events\Listeners;

use App\Events\ClientCreated;
use Modules\CustomFields\Models\ClientCustom;

class ClientCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(ClientCreated $event)
    {
        // Create the default custom record.
        $event->client->custom()->save(new ClientCustom());
    }
}
