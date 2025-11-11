<?php

namespace App\Events\Listeners;

use App\Events\ClientCreating;

class ClientCreatingListener
{
    public function __construct()
    {
        //
    }

    public function handle(ClientCreating $event)
    {
        $event->client->url_key = str_random(32);

        if (!$event->client->currency_code) {
            $event->client->currency_code = config('ip.base_currency');
        }

        if (!$event->client->language) {
            $event->client->language = config('ip.language');
        }
    }
}
