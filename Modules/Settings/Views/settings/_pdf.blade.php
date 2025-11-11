@section('javascript')
    @parent
    <script type="text/javascript">
      $(function () {

        updatePDFOptions();

        $('#pdfDriver').change(function () {
          updatePDFOptions();
        });

        function updatePDFOptions () {

          $('.wkhtmltopdf-option').hide();

          pdfDriver = $('#pdfDriver').val();

          if (pdfDriver == 'wkhtmltopdf') {
            $('.wkhtmltopdf-option').show();
          }
        }

      });
    </script>
@stop

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.paper_size'): </label>
            <select name="setting[paperSize]" class="form-control">
    @foreach($paperSizes as $key => $value)
        <option value="{{ $key }}" {{ old('setting[paperSize]', config('ip.paper_size') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.paper_orientation'): </label>
            <select name="setting[paperOrientation]" class="form-control">
    @foreach($paperOrientations as $key => $value)
        <option value="{{ $key }}" {{ old('setting[paperOrientation]', config('ip.paper_orientation') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

</div>

<div class="form-group">
    <label>@lang('ip.pdf_driver'): </label>
    <select name="setting[pdfDriver]" id="pdfDriver" class="form-control">
    @foreach($pdfDrivers as $key => $value)
        <option value="{{ $key }}" {{ old('setting[pdfDriver]', config('ip.pdf_driver') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="form-group wkhtmltopdf-option">
    <label>@lang('ip.binary_path'): </label>
    <input type="text" name="setting[pdfBinaryPath]" value="{{ old('setting[pdfBinaryPath]', config('ip.pdf_binary_path') }}" class="form-control">
</div>