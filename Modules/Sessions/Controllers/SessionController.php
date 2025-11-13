<?php

/**
 * InvoicePlane
 *
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (C) 2014 - 2018 InvoicePlane
 * @license     https://invoiceplane.com/license
 *
 * @link        https://invoiceplane.com
 *
 * Based on FusionInvoice by Jesse Terry (FusionInvoice, LLC)
 */

namespace Modules\Sessions\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Modules\Sessions\Requests\SessionRequest;

class SessionController extends Controller
{
    public function login()
    {
        deleteTempFiles();
        deleteViewCache();

        return view('sessions.login')->with('skin', config('fi.skin'));
    }

    public function attempt(SessionRequest $request)
    {
        // Rate limiting: max 5 attempts per minute per email
        $throttleKey = 'login_attempt:'.strtolower($request->input('email')).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => [trans('auth.throttle', ['seconds' => $seconds])],
            ]);
        }

        $rememberMe = ($request->input('remember_me')) ? true : false;

        if (! auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $rememberMe)) {
            // Increment rate limiter on failed attempt
            RateLimiter::hit($throttleKey, 60);

            return redirect()->route('session.login')->with('error', trans('ip.invalid_credentials'));
        }

        // Clear rate limiter on successful login
        RateLimiter::clear($throttleKey);

        if (! auth()->user()->client_id) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('clientCenter.dashboard');
    }

    public function logout()
    {
        auth()->logout();

        session()->flush();

        return redirect()->route('session.login');
    }
}
