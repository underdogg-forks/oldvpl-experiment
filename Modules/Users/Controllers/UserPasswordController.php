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

namespace Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ReturnUrl;
use Modules\Users\Models\User;
use Modules\Users\Requests\UpdatePasswordRequest;

class UserPasswordController extends Controller
{
    use ReturnUrl;

    public function edit($id)
    {
        $user = User::find($id);

        // Ensure users can only edit their own password unless they're an admin
        if ($user->id !== auth()->id() && auth()->user()->client_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.password_form')
            ->with('user', $user);
    }

    public function update(UpdatePasswordRequest $request, $id)
    {
        $user = User::find($id);

        // Ensure users can only update their own password unless they're an admin
        if ($user->id !== auth()->id() && auth()->user()->client_id) {
            abort(403, 'Unauthorized action.');
        }

        $user->password = $request->input('password');

        $user->save();

        return redirect($this->getReturnUrl())
            ->with('alertInfo', trans('ip.password_successfully_reset'));
    }
}
