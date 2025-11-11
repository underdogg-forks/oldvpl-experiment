@include('layouts._datepicker')
@include('layouts._typeahead')
@include('clients._js_lookup')
@include('recurring_invoices._js_create')

<div class="modal fade" id="create-recurring-invoice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@lang('ip.create_recurring_invoice')</h4>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                <form class="form-horizontal">

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="user_id">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.client')</label>

                        <div class="col-sm-9">
                            <input type="text" name="client_name" value="{{ old('client_name') }}" id="create_client_name" class="form-control client-lookup" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.company_profile')</label>

                        <div class="col-sm-9">
                            <select name="company_profile_id" id="company_profile_id" class="form-control">
    @foreach($companyProfiles as $key => $value)
        <option value="{{ $key }}" {{ old('company_profile_id', config('ip.default_company_profile') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.group')</label>

                        <div class="col-sm-9">
                            <select name="group_id" id="create_group_id" class="form-control">
    @foreach($groups as $key => $value)
        <option value="{{ $key }}" {{ old('group_id', config('ip.invoice_group') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.start_date')</label>
                        <div class="col-sm-9">
                            <input type="text" name="next_date" value="{{ old('next_date', date(config('ip.date_format') }}" id="create_next_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.every')</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select name="recurring_frequency" id="recurring_frequency" class="form-control">
                                        @foreach(range(1, 90) as $num)
                                            <option value="{{ $num }}" {{ old('recurring_frequency', 1) == $num ? 'selected' : '' }}>{{ $num }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <select name="recurring_period" id="recurring_period" class="form-control">
    @foreach($frequencies as $key => $value)
        <option value="{{ $key }}" {{ old('recurring_period', 3) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('ip.stop_date')</label>
                        <div class="col-sm-9">
                            <input type="text" name="stop_date" value="{{ old('stop_date') }}" id="create_stop_date" class="form-control">
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('ip.cancel')</button>
                <button type="button" id="recurring-invoice-create-confirm"
                        class="btn btn-primary">@lang('ip.submit')
                </button>
            </div>
        </div>
    </div>
</div>