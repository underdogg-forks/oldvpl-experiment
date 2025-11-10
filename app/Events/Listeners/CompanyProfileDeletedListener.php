<?php

namespace App\Events\Listeners;

use App\Events\CompanyProfileDeleted;

class CompanyProfileDeletedListener
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyProfileDeleted $event)
    {
        $event->companyProfile->custom->delete();
    }
}
