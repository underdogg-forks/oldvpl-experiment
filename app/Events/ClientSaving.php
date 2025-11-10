<?php

namespace App\Events;

use Modules\Clients\Models\Client;
use Illuminate\Queue\SerializesModels;

class ClientSaving extends Event
{
    use SerializesModels;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
