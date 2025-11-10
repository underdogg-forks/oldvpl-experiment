@section('javascript')
    @parent
    <script type="text/javascript">
      $().ready(function () {
        $('#btn-check-update').click(function () {
          $.get("{{ route('settings.updateCheck') }}")
            .done(function (response) {
              alert(response.message);
            })
            .fail(function (response) {
              alert("@lang('ip.unknown_error')");
            });
        });
      });
    </script>
@stop

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('ip.header_title_text'): </label>
            <input type="text" name="setting[headerTitleText]" value="{{ old('setting[headerTitleText]', config('fi.headerTitleText') }}" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('ip.default_company_profile'): </label>
            <select name="setting[defaultCompanyProfile]" class="form-control">
    @foreach($companyProfiles as $key => $value)
        <option value="{{ $key }}" {{ old('setting[defaultCompanyProfile]', config('fi.defaultCompanyProfile') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('ip.version'): </label>

            <div class="input-group">
                <input type="text" name="version" value="{{ old('version', config('fi.version') }}" class="form-control">
                <span class="input-group-btn">
					<button class="btn btn-default" id="btn-check-update"
                            type="button">@lang('ip.check_for_update')</button>
				</span>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-2">
        <div class="form-group">
            <label>@lang('ip.skin'): </label>
            <select name="setting[skin]" class="form-control">
    @foreach($skins as $key => $value)
        <option value="{{ $key }}" {{ old('setting[skin]', config('fi.skin') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>@lang('ip.language'): </label>
            <select name="setting[language]" class="form-control">
    @foreach($languages as $key => $value)
        <option value="{{ $key }}" {{ old('setting[language]', config('fi.language') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>@lang('ip.date_format'): </label>
            <select name="setting[dateFormat]" class="form-control">
    @foreach($dateFormats as $key => $value)
        <option value="{{ $key }}" {{ old('setting[dateFormat]', config('fi.dateFormat') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>{{ trans('ip.use_24_hour_time_format') }}: </label>
            <select name="setting[use24HourTimeFormat]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[use24HourTimeFormat]', config('fi.use24HourTimeFormat') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.timezone'): </label>
            <select name="setting[timezone]" class="form-control">
    @foreach($timezones as $key => $value)
        <option value="{{ $key }}" {{ old('setting[timezone]', config('fi.timezone') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>@lang('ip.display_client_unique_name'): </label>
                    <select name="setting[displayClientUniqueName]" class="form-control">
    @foreach($clientUniqueNameOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[displayClientUniqueName]', config('fi.displayClientUniqueName') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('ip.quantity_price_decimals'): </label>
                            <select name="setting[amountDecimals]" class="form-control">
    @foreach($amountDecimalOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[amountDecimals]', config('fi.amountDecimals') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('ip.round_tax_decimals'): </label>
                            <select name="setting[roundTaxDecimals]" class="form-control">
    @foreach($roundTaxDecimalOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[roundTaxDecimals]', config('fi.roundTaxDecimals') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.address_format'): </label>
            <textarea name="setting[addressFormat]" class="form-control" rows="5">{{ old('setting[addressFormat]', config('fi.addressFormat') }}</textarea>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('ip.base_currency'): </label>
                    <select name="setting[baseCurrency]" class="form-control">
    @foreach($currencies as $key => $value)
        <option value="{{ $key }}" {{ old('setting[baseCurrency]', config('fi.baseCurrency') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('ip.exchange_rate_mode'): </label>
                    <select name="setting[exchangeRateMode]" class="form-control">
    @foreach($exchangeRateModes as $key => $value)
        <option value="{{ $key }}" {{ old('setting[exchangeRateMode]', config('fi.exchangeRateMode') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('ip.results_per_page'):</label>
                    <select name="setting[resultsPerPage]" class="form-control">
    @foreach($resultsPerPage as $key => $value)
        <option value="{{ $key }}" {{ old('setting[resultsPerPage]', config('fi.resultsPerPage') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('ip.force_https'):</label>
                    <select name="setting[forceHttps]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[forceHttps]', config('fi.forceHttps') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                    <p class="help-block">@lang('ip.force_https_help')</p>
                </div>
            </div>
        </div>

    </div>
</div>