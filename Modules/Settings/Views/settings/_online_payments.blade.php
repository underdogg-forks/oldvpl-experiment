@foreach ($merchantDrivers as $driver)
    <h4>{{ $driver->getName() }}</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>@lang('ip.enabled')</label>
                <select name="{{ 'setting[' . $driver->getSettingKey('enabled') . ']' }}" class="form-control">
        <option value="0" {{ old('setting.' . $driver->getSettingKey('enabled'), $driver->getSetting('enabled')) == 0 ? 'selected' : '' }}> {{ trans('ip.no') }}</option>
        <option value="1" {{ old('setting.' . $driver->getSettingKey('enabled'), $driver->getSetting('enabled')) == 1 ? 'selected' : '' }}> {{ trans('ip.yes') }}</option>
</select>
            </div>
        </div>
        @foreach ($driver->getSettings() as $key => $setting)
            <div class="col-md-2">
                <div class="form-group">
                    @if (!is_array($setting))
                        <label>{{ trans('ip.' . snake_case($setting)) }}</label>
                        <input type="text" name="setting[" value="{{ old('setting[') }}" class="form-control">
                    @else
                        <label>{{ trans('ip.' . snake_case($key)) }}</label>
                        <select name="{{ 'setting[' . $driver->getSettingKey($key) . ']' }}" class="form-control">
    @foreach($setting as $opt_key => $opt_value)
        <option value="{{ $opt_key }}" {{ old('setting.' . $driver->getSettingKey($key), config('ip.' . $driver->getSettingKey($key))) == $opt_key ? 'selected' : '' }}>{{ $opt_value }</option>
    @endforeach
</select>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="col-md-2">
            <div class="form-group">
                <label>@lang('ip.payment_button_text')</label>
                <input type="text" name="setting[" value="{{ old('setting[') }}" class="form-control">
            </div>
        </div>
    </div>
@endforeach