<?php

namespace App\Events\Listeners;

use App\Events\InvoiceCreated;
use Modules\CustomFields\Models\InvoiceCustom;
use Modules\Groups\Models\Group;
use Modules\Invoices\Support\InvoiceCalculate;

class InvoiceCreatedListener
{
    private $invoiceCalculate;

    public function __construct(InvoiceCalculate $invoiceCalculate)
    {
        $this->invoiceCalculate = $invoiceCalculate;
    }

    public function handle(InvoiceCreated $event)
    {
        // Create the empty invoice amount record.
        $this->invoiceCalculate->calculate($event->invoice);

        // Increment the next id.
        Group::incrementNextId($event->invoice);

        // Create the custom invoice record.
        $event->invoice->custom()->save(new InvoiceCustom());
    }
}
