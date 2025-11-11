@include('layouts._datepicker')

@include('quotes._js_quote_to_invoice')

<div class="modal fade" id="modal-quote-to-invoice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@lang('ip.quote_to_invoice')</h4>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.date')</label>

                        <div class="col-sm-9">
                            <input type="text" name="invoice_date" value="{{ old('invoice_date', $invoice_date) }}" id="to_invoice_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.group')</label>

                        <div class="col-sm-9">
                            <select name="group_id" id="to_invoice_group_id" class="form-control">
    @foreach($groups as $key => $value)
        <option value="{{ $key }}" {{ old('group_id', config('ip.invoice_group') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('ip.cancel')</button>
                <button type="button" id="btn-quote-to-invoice-submit"
                        class="btn btn-primary">@lang('ip.submit')</button>
            </div>
        </div>
    </div>
</div>