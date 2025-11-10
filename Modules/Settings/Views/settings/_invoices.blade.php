<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_invoice_template'): </label>
            <select name="setting[invoiceTemplate]" class="form-control">
    @foreach($invoiceTemplates as $key => $value)
        <option value="{{ $key }}" {{ old('setting[invoiceTemplate]', config('fi.invoiceTemplate') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_group'): </label>
            <select name="setting[invoiceGroup]" class="form-control">
    @foreach($groups as $key => $value)
        <option value="{{ $key }}" {{ old('setting[invoiceGroup]', config('fi.invoiceGroup') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.invoices_due_after'): </label>
            <input type="text" name="setting[invoicesDueAfter]" value="{{ old('setting[invoicesDueAfter]', config('fi.invoicesDueAfter') }}" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_status_filter'): </label>
            <select name="setting[invoiceStatusFilter]" class="form-control">
    @foreach($invoiceStatuses as $key => $value)
        <option value="{{ $key }}" {{ old('setting[invoiceStatusFilter]', config('fi.invoiceStatusFilter') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

</div>

<div class="form-group">
    <label>@lang('ip.default_terms'): </label>
    <textarea name="setting[invoiceTerms]" class="form-control" rows="5">{{ old('setting[invoiceTerms]', config('fi.invoiceTerms') }}</textarea>
</div>

<div class="form-group">
    <label>@lang('ip.default_footer'): </label>
    <textarea name="setting[invoiceFooter]" class="form-control" rows="5">{{ old('setting[invoiceFooter]', config('fi.invoiceFooter') }}</textarea>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.automatic_email_on_recur'): </label>
            <select name="setting[automaticEmailOnRecur]" class="form-control">
        <option value="0" {{ old('setting[automaticEmailOnRecur]', config('fi.automaticEmailOnRecur') == '0' ? 'selected' : '' }}>{{ trans('ip.no') }}</option>
        <option value="1" {{ old('setting[automaticEmailOnRecur]', config('fi.automaticEmailOnRecur') == '1' ? 'selected' : '' }}>{{ trans('ip.yes') }}</option>
    </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.automatic_email_payment_receipts'): </label>
            <select name="setting[automaticEmailPaymentReceipts]" class="form-control">
        <option value="0" {{ old('setting[automaticEmailPaymentReceipts]', config('fi.automaticEmailPaymentReceipts') == '0' ? 'selected' : '' }}>{{ trans('ip.no') }}</option>
        <option value="1" {{ old('setting[automaticEmailPaymentReceipts]', config('fi.automaticEmailPaymentReceipts') == '1' ? 'selected' : '' }}>{{ trans('ip.yes') }}</option>
    </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.online_payment_method'): </label>
            <select name="setting[onlinePaymentMethod]" class="form-control">
    @foreach($paymentMethods as $key => $value)
        <option value="{{ $key }}" {{ old('setting[onlinePaymentMethod]', config('fi.onlinePaymentMethod') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.allow_payments_without_balance'): </label>
            <select name="setting[allowPaymentsWithoutBalance]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[allowPaymentsWithoutBalance]', config('fi.allowPaymentsWithoutBalance') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.if_invoice_is_emailed_while_draft'): </label>
            <select name="setting[resetInvoiceDateEmailDraft]" class="form-control">
    @foreach($invoiceWhenDraftOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[resetInvoiceDateEmailDraft]', config('fi.resetInvoiceDateEmailDraft') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.recalculate_invoices'): </label><br>
            <button type="button" class="btn btn-default" id="btn-recalculate-invoices"
                    data-loading-text="@lang('ip.recalculating_wait')">@lang('ip.recalculate')</button>
            <p class="help-block">@lang('ip.recalculate_help_text')</p>
        </div>
    </div>
</div>