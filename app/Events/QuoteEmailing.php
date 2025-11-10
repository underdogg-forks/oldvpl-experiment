<?php

namespace App\Events;

use Modules\Quotes\Models\Quote;
use Illuminate\Queue\SerializesModels;

class QuoteEmailing extends Event
{
    use SerializesModels;

    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }
}
