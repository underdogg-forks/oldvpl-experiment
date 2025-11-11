<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_invoice_template'): </label>
            <select name="setting[invoiceTemplate]" class="form-control">
    @foreach($invoiceTemplates as $key => $value)
        <option value="{{ $key }}" {{ old('setting[invoiceTemplate]', config('ip.invoice_template') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_group'): </label>
            <select name="setting[invoiceGroup]" class="form-control">
    @foreach($groups as $key => $value)
        <option value="{{ $key }}" {{ old('setting[invoiceGroup]', config('ip.invoice_group') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.invoices_due_after'): </label>
            <input type="text" name="setting[invoicesDueAfter]" value="{{ old('setting[invoicesDueAfter]', config('ip.invoices_due_after') }}" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_status_filter'): </label>
            <select name="setting[invoiceStatusFilter]" class="form-control">
    @foreach($invoiceStatuses as $key => $value)
        <option value="{{ $key }}" {{ old('setting[invoiceStatusFilter]', config('ip.invoice_status_filter') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

</div>

<div class="form-group">
    <label>@lang('ip.default_terms'): </label>
    <textarea name="setting[invoiceTerms]" class="form-control" rows="5">{{ old('setting[invoiceTerms]', config('ip.invoice_terms') }}</textarea>
</div>

<div class="form-group">
    <label>@lang('ip.default_footer'): </label>
    <textarea name="setting[invoiceFooter]" class="form-control" rows="5">{{ old('setting[invoiceFooter]', config('ip.invoice_footer') }}</textarea>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.automatic_email_on_recur'): </label>
            <select name="setting[automaticEmailOnRecur]" class="form-control">
        <option value="0" {{ old('setting[automaticEmailOnRecur]', config('ip.automatic_email_on_recur') == '0' ? 'selected' : '' }}>{{ trans('ip.no') }}</option>
        <option value="1" {{ old('setting[automaticEmailOnRecur]', config('ip.automatic_email_on_recur') == '1' ? 'selected' : '' }}>{{ trans('ip.yes') }}</option>
    </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.automatic_email_payment_receipts'): </label>
            <select name="setting[automaticEmailPaymentReceipts]" class="form-control">
        <option value="0" {{ old('setting[automaticEmailPaymentReceipts]', config('ip.automatic_email_payment_receipts') == '0' ? 'selected' : '' }}>{{ trans('ip.no') }}</option>
        <option value="1" {{ old('setting[automaticEmailPaymentReceipts]', config('ip.automatic_email_payment_receipts') == '1' ? 'selected' : '' }}>{{ trans('ip.yes') }}</option>
    </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.online_payment_method'): </label>
            <select name="setting[onlinePaymentMethod]" class="form-control">
    @foreach($paymentMethods as $key => $value)
        <option value="{{ $key }}" {{ old('setting[onlinePaymentMethod]', config('ip.online_payment_method') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.allow_payments_without_balance'): </label>
            <select name="setting[allowPaymentsWithoutBalance]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[allowPaymentsWithoutBalance]', config('ip.allow_payments_without_balance') == $key ? 'selected' : '' }}>{{ $value }</option>
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
        <option value="{{ $key }}" {{ old('setting[resetInvoiceDateEmailDraft]', config('ip.reset_invoice_date_email_draft') == $key ? 'selected' : '' }}>{{ $value }</option>
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