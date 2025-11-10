@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();

          @if ($editMode == true)
          $('#btn-delete-logo').click(function () {
            $.post("{{ route('companyProfiles.deleteLogo', [$companyProfile->id]) }}").done(function () {
              $('#div-logo').html('');
            });
          });
          @endif
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('companyProfiles.update', $companyProfile->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('companyProfiles.store') }}" enctype="multipart/form-data">
            @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.company_profile_form')
        </h1>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">{{ trans('ip.save' }}</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="content">

        @include('layouts._alerts')

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-body">

                        <div class="form-group">
                            <label>@lang('ip.company'): </label>
                            <input type="text" name="company" value="{{ old('company', $editMode ? $companyProfile->company : '') }}" id="company" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.address'): </label>
                            <textarea name="address" id="address" class="form-control" rows="4">{{ old('address', $editMode ? $companyProfile->address : '') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.city'): </label>
                                    <input type="text" name="city" value="{{ old('city', $editMode ? $companyProfile->city : '') }}" id="city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.state'): </label>
                                    <input type="text" name="state" value="{{ old('state', $editMode ? $companyProfile->state : '') }}" id="state" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.postal_code'): </label>
                                    <input type="text" name="zip" value="{{ old('zip', $editMode ? $companyProfile->zip : '') }}" id="zip" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.country'): </label>
                                    <input type="text" name="country" value="{{ old('country', $editMode ? $companyProfile->country : '') }}" id="country" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.phone'): </label>
                                    <input type="text" name="phone" value="{{ old('phone', $editMode ? $companyProfile->phone : '') }}" id="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.fax'): </label>
                                    <input type="text" name="fax" value="{{ old('fax', $editMode ? $companyProfile->fax : '') }}" id="fax" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.mobile'): </label>
                                    <input type="text" name="mobile" value="{{ old('mobile', $editMode ? $companyProfile->mobile : '') }}" id="mobile" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.web'): </label>
                                    <input type="text" name="web" value="{{ old('web', $editMode ? $companyProfile->web : '') }}" id="web" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.logo'): </label>
                                    @if (!config('app.demo'))
                                        <div id="div-logo">
                                            @if ($editMode and $companyProfile->logo)
                                                <p>{!! $companyProfile->logo(100) !!}</p>
                                                <a href="javascript:void(0)"
                                                   id="btn-delete-logo">@lang('ip.remove_logo')</a>
                                            @endif
                                        </div>
                                        <input type="file" name="logo">
                                    @else
                                        Disabled for demo
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.default_invoice_template'):</label>
                                    <select name="invoice_template" id="invoice_template" class="form-control">
    @foreach($invoiceTemplates as $key => $value)
        <option value="{{ $key }}" {{ old('invoice_template', ((isset($companyProfile) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.default_quote_template'):</label>
                                    <select name="quote_template" id="invoice_template" class="form-control">
    @foreach($quoteTemplates as $key => $value)
        <option value="{{ $key }}" {{ old('quote_template', ((isset($companyProfile) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                                </div>
                            </div>
                        </div>

                        @if ($customFields->count())
                            @include('custom_fields._custom_fields')
                        @endif


                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop