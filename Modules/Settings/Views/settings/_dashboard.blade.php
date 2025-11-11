<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>@lang('ip.display_profile_image'): </label>
            <select name="setting[displayProfileImage]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[displayProfileImage]', config('ip.display_profile_image') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

</div>

@foreach ($dashboardWidgets as $widget)

    <h4 style="font-weight: bold; clear: both;">{{ $widget }}</h4>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>@lang('ip.enabled'): </label>
                <select name="{{ setting[widgetEnabled" . $widget . "]" }}" id="{{ widgetEnabled" . $widget }}" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old(setting[widgetEnabled" . $widget . "]", config('ip.widgetEnabled' . $widget)) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>@lang('ip.display_order'): </label>
                <select name="{{ setting[widgetDisplayOrder" . $widget . "]" }}" id="{{ widgetDisplayOrder" . $widget }}" class="form-control">
    @foreach($displayOrderArray as $key => $value)
        <option value="{{ $key }}" {{ old(setting[widgetDisplayOrder" . $widget . "]", config('ip.widgetDisplayOrder' . $widget)) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>@lang('ip.column_width'): </label>
                <select name="{{ setting[widgetColumnWidth" . $widget . "]" }}" id="{{ widgetColumnWidth" . $widget }}" class="form-control">
    @foreach($colWidthArray as $key => $value)
        <option value="{{ $key }}" {{ old(setting[widgetColumnWidth" . $widget . "]", config('ip.widgetColumnWidth' . $widget)) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
            </div>
        </div>
    </div>

    @if (view()->exists($widget . 'WidgetSettings'))
        @include($widget . 'WidgetSettings')
    @endif

@endforeach