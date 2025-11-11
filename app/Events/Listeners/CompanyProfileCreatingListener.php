<?php

namespace App\Events\Listeners;

use App\Events\CompanyProfileCreating;

class CompanyProfileCreatingListener
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyProfileCreating $event)
    {
        if (!$event->companyProfile->invoice_template) {
            $event->companyProfile->invoice_template = config('ip.invoice_template');
        }

        if (!$event->companyProfile->quote_template) {
            $event->companyProfile->quote_template = config('ip.quote_template');
        }
    }
}
