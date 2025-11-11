<?php

namespace App\Events\Listeners;

use App\Events\InvoiceEmailing;
use App\Support\DateFormatter;

class InvoiceEmailingListener
{
    public function handle(InvoiceEmailing $event)
    {
        if (config('ip.reset_invoice_date_email_draft') and $event->invoice->status_text == 'draft') {
            $event->invoice->invoice_date = date('Y-m-d');
            $event->invoice->due_at = DateFormatter::incrementDateByDays(date('Y-m-d'), config('ip.invoices_due_after'));
            $event->invoice->save();
        }
    }
}
