@include('layouts._datepicker')

<script type="text/javascript">
  $(function () {
    $('#invoice-dashboard-total-setting-from-date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
    $('#invoice-dashboard-total-setting-to-date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#invoice-dashboard-total-setting').change(function () {
      toggleWidgetInvoiceDashboardTotalsDateRange($('#invoice-dashboard-total-setting').val());
    });

    function toggleWidgetInvoiceDashboardTotalsDateRange (val) {
      if (val == 'custom_date_range') {
        $('#div-invoice-dashboard-totals-date-range').show();
      }
      else {
        $('#div-invoice-dashboard-totals-date-range').hide();
      }
    }

    toggleWidgetInvoiceDashboardTotalsDateRange($('#invoice-dashboard-total-setting').val());
  });
</script>

<div class="form-group">
    <label>@lang('ip.dashboard_totals_option'): </label>
    <select name="setting[widgetInvoiceSummaryDashboardTotals]" id="invoice-dashboard-total-setting" class="form-control">
    @foreach($dashboardTotalOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[widgetInvoiceSummaryDashboardTotals]', config('ip.widget_invoice_summary_dashboard_totals') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="row" id="div-invoice-dashboard-totals-date-range">
    <div class="col-md-2">
        <label>@lang('ip.from_date') (yyyy-mm-dd):</label>
        <input type="text" name="setting[widgetInvoiceSummaryDashboardTotalsFromDate]" value="{{ old('setting[widgetInvoiceSummaryDashboardTotalsFromDate]', config('ip.widget_invoice_summary_dashboard_totals_from_date') }}" id="invoice-dashboard-total-setting-from-date" class="form-control">
    </div>
    <div class="col-md-2">
        <label>@lang('ip.to_date') (yyyy-mm-dd):</label>
        <input type="text" name="setting[widgetInvoiceSummaryDashboardTotalsToDate]" value="{{ old('setting[widgetInvoiceSummaryDashboardTotalsToDate]', config('ip.widget_invoice_summary_dashboard_totals_to_date') }}" id="invoice-dashboard-total-setting-to-date" class="form-control">
    </div>
</div>