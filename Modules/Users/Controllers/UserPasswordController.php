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

namespace Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use Modules\Users\Models\User;
use Modules\Users\Requests\UpdatePasswordRequest;
use App\Traits\ReturnUrl;

class UserPasswordController extends Controller
{
    use ReturnUrl;

    public function edit($id)
    {
        return view('users.password_form')
            ->with('user', User::find($id));
    }

    public function update(UpdatePasswordRequest $request, $id)
    {
        $user = User::find($id);

        $user->password = $request->input('password');

        $user->save();

        return redirect($this->getReturnUrl())
            ->with('alertInfo', trans('ip.password_successfully_reset'));
    }
}