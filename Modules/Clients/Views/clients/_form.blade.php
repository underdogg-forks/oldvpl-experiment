@include('clients._js_unique_name')

<script type="text/javascript">
  $(function () {
    $('#name').focus();
  });
</script>

<div class="row">
    <div class="col-md-4" id="col-client-name">
        <div class="form-group">
            <label>* @lang('ip.client_name'):</label>
            <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
            <p class="help-block">
                <small>@lang('ip.help_text_client_name')
                    <a href="javascript:void(0)" id="btn-show-unique-name"
                       tabindex="-1">@lang('ip.view_unique_name')</a>
                </small>
            </p>
        </div>
    </div>
    <div class="col-md-3" id="col-client-unique-name" style="display: none;">
        <div class="form-group">
            <label>* @lang('ip.unique_name'):</label>
            <input type="text" name="unique_name" value="{{ old('unique_name') }}" id="unique_name" class="form-control">
            <p class="help-block">
                <small>@lang('ip.help_text_client_unique_name')</small>
            </p>
        </div>
    </div>
    <div class="col-md-4" id="col-client-email">
        <div class="form-group">
            <label>@lang('ip.email_address'): </label>
            <input type="text" name="client_email" value="{{ old('client_email') }}" id="client_email" class="form-control">
        </div>
    </div>
    <div class="col-md-4" id="col-client-active">
        <div class="form-group">
            <label>@lang('ip.active'):</label>
            {!! Form::select('active', ['0' => trans('ip.no'), '1' => trans('ip.yes')], ((isset($editMode) and $editMode) ? null : 1), ['id' => 'active', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label>@lang('ip.address'): </label>
    <textarea name="address" id="address" class="form-control" rows="4">{{ old('address') }}</textarea>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.city'): </label>
            <input type="text" name="city" value="{{ old('city') }}" id="city" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.state'): </label>
            <input type="text" name="state" value="{{ old('state') }}" id="state" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.postal_code'): </label>
            <input type="text" name="zip" value="{{ old('zip') }}" id="zip" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.country'): </label>
            <input type="text" name="country" value="{{ old('country') }}" id="country" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.phone_number'): </label>
            <input type="text" name="phone" value="{{ old('phone') }}" id="phone" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.fax_number'): </label>
            <input type="text" name="fax" value="{{ old('fax') }}" id="fax" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.mobile_number'): </label>
            <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.web_address'): </label>
            <input type="text" name="web" value="{{ old('web') }}" id="web" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_currency'): </label>
            {!! Form::select('currency_code', $currencies, ((isset($client)) ? $client->currency_code : config('fi.baseCurrency')), ['id' => 'currency_code', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.language'): </label>
            {!! Form::select('language', $languages, ((isset($client)) ? $client->language : config('fi.language')), ['id' => 'language', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>

@if ($customFields->count())
    @include('custom_fields._custom_fields')
@endif
