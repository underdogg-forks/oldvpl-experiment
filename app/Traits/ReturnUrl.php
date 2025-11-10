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

namespace App\Traits;

/**
 * Return URL Trait
 * 
 * Provides functionality to store and retrieve return URLs for redirects.
 * This follows the Single Responsibility Principle by isolating URL handling logic.
 */
trait ReturnUrl
{
    /**
     * Store the current URL in the session for later retrieval.
     *
     * @return void
     */
    public function setReturnUrl(): void
    {
        session(['returnUrl' => request()->fullUrl()]);
    }

    /**
     * Retrieve the stored return URL from the session.
     *
     * @return string|null
     */
    public function getReturnUrl(): ?string
    {
        return session('returnUrl');
    }

    /**
     * Clear the stored return URL from the session.
     *
     * @return void
     */
    public function clearReturnUrl(): void
    {
        session()->forget('returnUrl');
    }
}
