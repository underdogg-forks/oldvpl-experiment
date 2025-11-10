<?php

namespace App\Events\Listeners;

use App\Events\InvoiceModified;
use Modules\Invoices\Support\InvoiceCalculate;

class InvoiceModifiedListener
{
    public function __construct(InvoiceCalculate $invoiceCalculate)
    {
        $this->invoiceCalculate = $invoiceCalculate;
    }

    public function handle(InvoiceModified $event)
    {
        $this->invoiceCalculate->calculate($event->invoice);
    }
}
