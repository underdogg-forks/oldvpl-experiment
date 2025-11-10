<?php

namespace App\Events;

use Modules\Invoices\Models\Invoice;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated extends Event
{
    use SerializesModels;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
}
