@include('layouts._datepicker')
@include('payments._js_create')

<div class="modal fade" id="modal-enter-payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@lang('ip.enter_payment'): @lang('ip.invoice')
                    #{{ $invoiceNumber }}</h4>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                <form class="form-horizontal">

                    <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $invoice_id }}">

                    <div class="form-group">
                        <label class="col-sm-4 control-label">@lang('ip.amount')</label>

                        <div class="col-sm-8">
                            <input type="text" name="payment_amount" value="{{ old('payment_amount', $balance) }}" id="payment_amount" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">@lang('ip.payment_date')</label>

                        <div class="col-sm-8">
                            <input type="text" name="payment_date" value="{{ old('payment_date', $date) }}" id="payment_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">@lang('ip.payment_method')</label>

                        <div class="col-sm-8">
                            <select name="payment_method_id" id="payment_method_id" class="form-control">
    @foreach($paymentMethods as $key => $value)
        <option value="{{ $key }}" {{ old('payment_method_id') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">@lang('ip.note')</label>

                        <div class="col-sm-8">
                            <textarea name="payment_note" id="payment_note" class="form-control" rows="4">{{ old('payment_note') }}</textarea>
                        </div>
                    </div>

                    @if (config('ip.mail_configured') and $client->email)
                        <div class="form-group">
                            <label class="col-sm-4 control-label">@lang('ip.email_payment_receipt')</label>

                            <div class="col-sm-8">
                                <input type="checkbox" name="email_payment_receipt" value="1" {{ old('email_payment_receipt', config('ip.automatic_email_payment_receipts') ? 'checked' : '' }} id="email_payment_receipt">
                            </div>
                        </div>
                    @endif

                    <div id="payment-custom-fields">
                        @if ($customFields->count())
                            @include('custom_fields._custom_fields_modal')
                        @endif
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('ip.cancel')</button>
                <button type="button" id="enter-payment-confirm" class="btn btn-primary"
                        data-loading-text="@lang('ip.please_wait')...">@lang('ip.submit')</button>
            </div>
        </div>
    </div>
</div>