<?php

namespace App\Events\Listeners;

use App\Events\RecurringInvoiceModified;
use Modules\RecurringInvoices\Support\RecurringInvoiceCalculate;

class RecurringInvoiceModifiedListener
{
    private $recurringInvoiceCalculate;

    public function __construct(RecurringInvoiceCalculate $recurringInvoiceCalculate)
    {
        $this->recurringInvoiceCalculate = $recurringInvoiceCalculate;
    }

    public function handle(RecurringInvoiceModified $event)
    {
        $this->recurringInvoiceCalculate->calculate($event->recurringInvoice->id);
    }
}
