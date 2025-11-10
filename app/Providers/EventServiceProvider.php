<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\AttachmentCreating' => [
            'App\Events\Listeners\AttachmentCreatingListener',
        ],

        'App\Events\AttachmentDeleted' => [
            'App\Events\Listeners\AttachmentDeletedListener',
        ],

        'App\Events\CheckAttachment' => [
            'App\Events\Listeners\CheckAttachmentListener',
        ],

        'App\Events\ClientCreated' => [
            'App\Events\Listeners\ClientCreatedListener',
        ],

        'App\Events\ClientCreating' => [
            'App\Events\Listeners\ClientCreatingListener',
        ],

        'App\Events\ClientDeleted' => [
            'App\Events\Listeners\ClientDeletedListener',
        ],

        'App\Events\ClientSaving' => [
            'App\Events\Listeners\ClientSavingListener',
        ],

        'App\Events\CompanyProfileCreated' => [
            'App\Events\Listeners\CompanyProfileCreatedListener',
        ],

        'App\Events\CompanyProfileCreating' => [
            'App\Events\Listeners\CompanyProfileCreatingListener',
        ],

        'App\Events\CompanyProfileDeleted' => [
            'App\Events\Listeners\CompanyProfileDeletedListener',
        ],

        'App\Events\CompanyProfileSaving' => [
            'App\Events\Listeners\CompanyProfileSavingListener',
        ],

        'App\Events\ExpenseCreated' => [
            'App\Events\Listeners\ExpenseCreatedListener',
        ],

        'App\Events\ExpenseDeleting' => [
            'App\Events\Listeners\ExpenseDeletingListener',
        ],

        'App\Events\ExpenseSaved' => [],

        'App\Events\ExpenseSaving' => [
            'App\Events\Listeners\ExpenseSavingListener',
        ],

        'App\Events\InvoiceCreated' => [
            'App\Events\Listeners\InvoiceCreatedListener',
        ],

        'App\Events\InvoiceCreating' => [
            'App\Events\Listeners\InvoiceCreatingListener',
        ],

        'App\Events\InvoiceCreatedRecurring' => [
            'App\Events\Listeners\InvoiceCreatedRecurringListener',
        ],

        'App\Events\InvoiceDeleted' => [
            'App\Events\Listeners\InvoiceDeletedListener',
        ],

        'App\Events\InvoiceEmailing' => [
            'App\Events\Listeners\InvoiceEmailingListener',
        ],

        'App\Events\InvoiceEmailed' => [
            'App\Events\Listeners\InvoiceEmailedListener',
        ],

        'App\Events\InvoiceItemSaving' => [
            'App\Events\Listeners\InvoiceItemSavingListener',
        ],

        'App\Events\InvoiceModified' => [
            'App\Events\Listeners\InvoiceModifiedListener',
        ],

        'App\Events\InvoiceViewed' => [
            'App\Events\Listeners\InvoiceViewedListener',
        ],

        'App\Events\NoteCreated' => [
            'App\Events\Listeners\NoteCreatedListener',
        ],

        'App\Events\OverdueNoticeEmailed' => [],

        'App\Events\PaymentCreated' => [
            'App\Events\Listeners\PaymentCreatedListener',
        ],

        'App\Events\PaymentCreating' => [
            'App\Events\Listeners\PaymentCreatingListener',
        ],

        'App\Events\QuoteCreated' => [
            'App\Events\Listeners\QuoteCreatedListener',
        ],

        'App\Events\QuoteCreating' => [
            'App\Events\Listeners\QuoteCreatingListener',
        ],

        'App\Events\QuoteDeleted' => [
            'App\Events\Listeners\QuoteDeletedListener',
        ],

        'App\Events\QuoteItemSaving' => [
            'App\Events\Listeners\QuoteItemSavingListener',
        ],

        'App\Events\QuoteModified' => [
            'App\Events\Listeners\QuoteModifiedListener',
        ],

        'App\Events\QuoteEmailed' => [
            'App\Events\Listeners\QuoteEmailedListener',
        ],

        'App\Events\QuoteEmailing' => [
            'App\Events\Listeners\QuoteEmailingListener',
        ],

        'App\Events\QuoteApproved' => [
            'App\Events\Listeners\QuoteApprovedListener',
        ],

        'App\Events\QuoteRejected' => [
            'App\Events\Listeners\QuoteRejectedListener',
        ],

        'App\Events\QuoteViewed' => [
            'App\Events\Listeners\QuoteViewedListener',
        ],

        'App\Events\RecurringInvoiceCreated' => [
            'App\Events\Listeners\RecurringInvoiceCreatedListener',
        ],

        'App\Events\RecurringInvoiceCreating' => [
            'App\Events\Listeners\RecurringInvoiceCreatingListener',
        ],

        'App\Events\RecurringInvoiceDeleted' => [
            'App\Events\Listeners\RecurringInvoiceDeletedListener',
        ],

        'App\Events\RecurringInvoiceItemSaving' => [
            'App\Events\Listeners\RecurringInvoiceItemSavingListener',
        ],

        'App\Events\RecurringInvoiceModified' => [
            'App\Events\Listeners\RecurringInvoiceModifiedListener',
        ],

        'App\Events\SettingSaving' => [
            'App\Events\Listeners\SettingSavingListener',
        ],

        'App\Events\UserCreated' => [
            'App\Events\Listeners\UserCreatedListener',
        ],

        'App\Events\UserDeleted' => [
            'App\Events\Listeners\UserDeletedListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
