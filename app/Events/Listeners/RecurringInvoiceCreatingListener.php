<?php

namespace App\Events\Listeners;

use App\Events\RecurringInvoiceCreating;
use Modules\Currencies\Support\CurrencyConverterFactory;

class RecurringInvoiceCreatingListener
{
    public function handle(RecurringInvoiceCreating $event)
    {
        $recurringInvoice = $event->recurringInvoice;

        if (!$recurringInvoice->user_id) {
            $recurringInvoice->user_id = auth()->user()->id;
        }

        if (!$recurringInvoice->company_profile_id) {
            $recurringInvoice->company_profile_id = config('ip.default_company_profile');
        }

        if (!$recurringInvoice->group_id) {
            $recurringInvoice->group_id = config('ip.invoice_group');
        }

        if (!isset($recurringInvoice->terms)) {
            $recurringInvoice->terms = config('ip.invoice_terms');
        }

        if (!isset($recurringInvoice->footer)) {
            $recurringInvoice->footer = config('ip.invoice_footer');
        }

        if (!$recurringInvoice->template) {
            $recurringInvoice->template = $recurringInvoice->companyProfile->invoice_template;
        }

        if (!$recurringInvoice->currency_code) {
            $recurringInvoice->currency_code = $recurringInvoice->client->currency_code;
        }

        if ($recurringInvoice->currency_code == config('ip.base_currency')) {
            $recurringInvoice->exchange_rate = 1;
        } elseif (!$recurringInvoice->exchange_rate) {
            $currencyConverter = CurrencyConverterFactory::create();
            $recurringInvoice->exchange_rate = $currencyConverter->convert(config('ip.base_currency'), $recurringInvoice->currency_code);
        }
    }
}
