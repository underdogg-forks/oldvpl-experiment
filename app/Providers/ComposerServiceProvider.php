<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.master', 'App\Composers\LayoutComposer');
        view()->composer(['client_center.layouts.master', 'client_center.layouts.public', 'layouts.master', 'setup.master'], 'App\Composers\SkinComposer');
        view()->composer('clients._form', 'App\Composers\ClientFormComposer');
        view()->composer('invoices._table', 'App\Composers\InvoiceTableComposer');
        view()->composer('quotes._table', 'App\Composers\QuoteTableComposer');
        view()->composer('reports.options.*', 'App\Composers\ReportComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
