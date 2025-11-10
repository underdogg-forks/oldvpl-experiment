<?php

/**
 * InvoicePlane
 *
 * @package     InvoicePlane
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (C) 2014 - 2018 InvoicePlane
 * @license     https://invoiceplane.com/license
 * @link        https://invoiceplane.com
 *
 * Based on FusionInvoice by Jesse Terry (FusionInvoice, LLC)
 */

namespace Modules\Currencies\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ReturnUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Currencies\Models\Currency;
use Modules\Currencies\Requests\CurrencyStoreRequest;
use Modules\Currencies\Requests\CurrencyUpdateRequest;
use Modules\Currencies\Support\CurrencyConverterFactory;

/**
 * Currency Controller
 * 
 * Handles CRUD operations for currencies following SOLID principles.
 */
class CurrencyController extends Controller
{
    use ReturnUrl;

    /**
     * Display a listing of currencies.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->setReturnUrl();

        $currencies = Currency::sortable(['name' => 'asc'])
            ->paginate(config('fi.resultsPerPage'));

        return view('currencies.index', [
            'currencies' => $currencies,
            'baseCurrency' => config('fi.baseCurrency'),
        ]);
    }

    /**
     * Show the form for creating a new currency.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('currencies.form', [
            'editMode' => false,
        ]);
    }

    /**
     * Store a newly created currency.
     *
     * @param \Modules\Currencies\Requests\CurrencyStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CurrencyStoreRequest $request): RedirectResponse
    {
        Currency::create($request->validated());

        return redirect($this->getReturnUrl())
            ->with('alertSuccess', trans('ip.record_successfully_created'));
    }

    /**
     * Show the form for editing the specified currency.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id): View
    {
        $currency = Currency::findOrFail($id);

        return view('currencies.form', [
            'editMode' => true,
            'currency' => $currency,
        ]);
    }

    /**
     * Update the specified currency.
     *
     * @param \Modules\Currencies\Requests\CurrencyUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CurrencyUpdateRequest $request, int $id): RedirectResponse
    {
        $currency = Currency::findOrFail($id);
        $currency->fill($request->validated());
        $currency->save();

        return redirect($this->getReturnUrl())
            ->with('alertInfo', trans('ip.record_successfully_updated'));
    }

    /**
     * Remove the specified currency.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $currency = Currency::findOrFail($id);

        // Early return if currency is in use
        if ($currency->in_use) {
            return redirect()->route('currencies.index')
                ->with('alert', trans('ip.cannot_delete_record_in_use'));
        }

        Currency::destroy($id);

        return redirect()->route('currencies.index')
            ->with('alert', trans('ip.record_successfully_deleted'));
    }

    /**
     * Get exchange rate for a currency.
     *
     * @return float
     */
    public function getExchangeRate()
    {
        $currencyConverter = CurrencyConverterFactory::create();
        $baseCurrency = config('fi.baseCurrency');
        $targetCurrency = request('currency_code');

        return $currencyConverter->convert($baseCurrency, $targetCurrency);
    }
}
