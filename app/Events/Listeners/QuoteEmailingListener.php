<?php

namespace App\Events\Listeners;

use App\Events\QuoteEmailing;
use App\Support\DateFormatter;

class QuoteEmailingListener
{
    public function handle(QuoteEmailing $event)
    {
        if (config('ip.reset_quote_date_email_draft') and $event->quote->status_text == 'draft') {
            $event->quote->quote_date = date('Y-m-d');
            $event->quote->expires_at = DateFormatter::incrementDateByDays(date('Y-m-d'), config('ip.quotes_expire_after'));
            $event->quote->save();
        }
    }
}
