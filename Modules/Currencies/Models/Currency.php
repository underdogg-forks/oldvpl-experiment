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

namespace Modules\Currencies\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Modules\Clients\Models\Client;
use Modules\Invoices\Models\Invoice;
use Modules\Quotes\Models\Quote;

/**
 * Currency Model
 * 
 * Represents a currency in the system with sorting and usage tracking capabilities.
 */
class Currency extends Model
{
    use Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * The attributes that can be sorted.
     *
     * @var array<int, string>
     */
    protected $sortable = ['code', 'name', 'symbol', 'placement', 'decimal', 'thousands'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * Get a list of all currencies.
     *
     * @return array<string, string>
     */
    public static function getList(): array
    {
        return self::orderBy('name')->pluck('name', 'code')->all();
    }

    /**
     * Check if the currency is currently in use.
     * 
     * A currency is in use if:
     * - It's the base currency
     * - It's assigned to any clients
     * - It's used in any quotes
     * - It's used in any invoices
     *
     * @return bool
     */
    public function getInUseAttribute(): bool
    {
        // Early return if this is the base currency
        if ($this->code === config('fi.baseCurrency')) {
            return true;
        }

        // Early return if any clients use this currency
        if (Client::where('currency_code', $this->code)->exists()) {
            return true;
        }

        // Early return if any quotes use this currency
        if (Quote::where('currency_code', $this->code)->exists()) {
            return true;
        }

        // Early return if any invoices use this currency
        if (Invoice::where('currency_code', $this->code)->exists()) {
            return true;
        }

        return false;
    }

    /**
     * Get the formatted placement description.
     *
     * @return string
     */
    public function getFormattedPlacementAttribute(): string
    {
        return $this->placement === 'before' 
            ? trans('ip.before_amount') 
            : trans('ip.after_amount');
    }
}
