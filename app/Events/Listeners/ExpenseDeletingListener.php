<?php

namespace App\Events\Listeners;

use App\Events\ExpenseDeleting;

class ExpenseDeletingListener
{
    public function __construct()
    {
        //
    }

    public function handle(ExpenseDeleting $event)
    {
        foreach ($event->expense->attachments as $attachment) {
            $attachment->delete();
        }

        if ($event->expense->custom) {
            $event->expense->custom->delete();
        }
    }
}
