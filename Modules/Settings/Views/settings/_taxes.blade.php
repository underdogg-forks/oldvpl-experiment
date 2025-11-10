<div class="form-group">
    <label>@lang('ip.default_item_tax_rate'): </label>
    <select name="setting[itemTaxRate]" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('setting[itemTaxRate]', config('fi.itemTaxRate') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="form-group">
    <label>{{ trans('ip.default_item_tax_2_rate') }}: </label>
    <select name="setting[itemTax2Rate]" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('setting[itemTax2Rate]', config('fi.itemTax2Rate') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>