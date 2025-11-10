<?php

namespace App\Events;

use Modules\Expenses\Models\Expense;
use Illuminate\Queue\SerializesModels;

class ExpenseDeleting extends Event
{
    use SerializesModels;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }
}
