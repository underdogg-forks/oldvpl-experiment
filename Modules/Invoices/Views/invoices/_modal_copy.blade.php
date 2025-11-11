@include('invoices._js_copy')

<div class="modal fade" id="modal-copy-invoice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@lang('ip.copy')</h4>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.client')</label>
                        <div class="col-sm-9">
                            <input type="text" name="client_name" value="{{ old('client_name', $invoice->client->unique_name) }}" id="copy_client_name" class="form-control client-lookup" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.date')</label>
                        <div class="col-sm-9">
                            <input type="text" name="invoice_date" value="{{ old('invoice_date', date(config('ip.date_format') }}" id="copy_invoice_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.company_profile')</label>
                        <div class="col-sm-9">
                            <select name="company_profile_id" id="copy_company_profile_id" class="form-control">
    @foreach($companyProfiles as $key => $value)
        <option value="{{ $key }}" {{ old('company_profile_id', config('ip.default_company_profile') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.group')</label>
                        <div class="col-sm-9">
                            <select name="group_id" id="copy_group_id" class="form-control">
    @foreach($groups as $key => $value)
        <option value="{{ $key }}" {{ old('group_id', $invoice->group_id) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('ip.cancel')</button>
                <button type="button" id="btn-copy-invoice-submit"
                        class="btn btn-primary">@lang('ip.submit')</button>
            </div>
        </div>
    </div>
</div>