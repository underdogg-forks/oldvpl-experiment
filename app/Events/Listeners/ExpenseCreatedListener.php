<?php

namespace App\Events\Listeners;

use App\Events\ExpenseCreated;
use Modules\CustomFields\Models\ExpenseCustom;

class ExpenseCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(ExpenseCreated $event)
    {
        $event->expense->custom()->save(new ExpenseCustom());
    }
}