<?php

namespace App\Events\Listeners;

use App\Events\QuoteCreated;
use Modules\CustomFields\Models\QuoteCustom;
use Modules\Groups\Models\Group;
use Modules\Quotes\Support\QuoteCalculate;

class QuoteCreatedListener
{
    public function __construct(QuoteCalculate $quoteCalculate)
    {
        $this->quoteCalculate = $quoteCalculate;
    }

    public function handle(QuoteCreated $event)
    {
        // Create the empty quote amount record
        $this->quoteCalculate->calculate($event->quote);

        // Increment the next id
        Group::incrementNextId($event->quote);

        // Create the custom quote record.
        $event->quote->custom()->save(new QuoteCustom());
    }
}
