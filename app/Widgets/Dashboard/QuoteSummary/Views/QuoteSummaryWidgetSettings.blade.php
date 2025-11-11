@include('layouts._datepicker')

<script type="text/javascript">
  $(function () {
    $('#quote-dashboard-total-setting-from-date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
    $('#quote-dashboard-total-setting-to-date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#quote-dashboard-total-setting').change(function () {
      toggleWidgetQuoteDashboardTotalsDateRange($('#quote-dashboard-total-setting').val());
    });

    function toggleWidgetQuoteDashboardTotalsDateRange (val) {
      if (val == 'custom_date_range') {
        $('#div-quote-dashboard-totals-date-range').show();
      }
      else {
        $('#div-quote-dashboard-totals-date-range').hide();
      }
    }

    toggleWidgetQuoteDashboardTotalsDateRange($('#quote-dashboard-total-setting').val());
  });
</script>

<div class="form-group">
    <label>@lang('ip.dashboard_totals_option'): </label>
    <select name="setting[widgetQuoteSummaryDashboardTotals]" id="quote-dashboard-total-setting" class="form-control">
    @foreach($dashboardTotalOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[widgetQuoteSummaryDashboardTotals]', config('ip.widget_quote_summary_dashboard_totals') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="row" id="div-quote-dashboard-totals-date-range">
    <div class="col-md-2">
        <label>@lang('ip.from_date') (yyyy-mm-dd):</label>
        <input type="text" name="setting[widgetQuoteSummaryDashboardTotalsFromDate]" value="{{ old('setting[widgetQuoteSummaryDashboardTotalsFromDate]', config('ip.widget_quote_summary_dashboard_totals_from_date') }}" id="quote-dashboard-total-setting-from-date" class="form-control">
    </div>
    <div class="col-md-2">
        <label>@lang('ip.to_date') (yyyy-mm-dd):</label>
        <input type="text" name="setting[widgetQuoteSummaryDashboardTotalsToDate]" value="{{ old('setting[widgetQuoteSummaryDashboardTotalsToDate]', config('ip.widget_quote_summary_dashboard_totals_to_date') }}" id="quote-dashboard-total-setting-to-date" class="form-control">
    </div>
</div>