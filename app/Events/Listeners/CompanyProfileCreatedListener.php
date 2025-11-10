<?php

namespace App\Events\Listeners;

use App\Events\CompanyProfileCreated;
use Modules\CustomFields\Models\CompanyProfileCustom;

class CompanyProfileCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyProfileCreated $event)
    {
        // Create the default custom record.
        $event->companyProfile->custom()->save(new CompanyProfileCustom());
    }
}
