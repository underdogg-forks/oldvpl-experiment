@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('currencies.update', $currency->id) }}">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('currencies.store') }}">
            @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.currency_form')
        </h1>
        <div class="pull-right">
            <button class="btn btn-primary"><i class="fa fa-save"></i> @lang('ip.save')</button>
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
                            <label>@lang('ip.name'): </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $editMode ? $currency->name : '') }}">
                            <p class="help-block">@lang('ip.help_currency_name')</p>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.code'): </label>
                                    @if ($editMode and $currency->in_use)
                                        <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $currency->code) }}" readonly>
                                    @else
                                        <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $editMode ? $currency->code : '') }}">
                                    @endif

                                    <p class="help-block">@lang('ip.help_currency_code')</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.symbol'): </label>
                                    <input type="text" name="symbol" id="symbol" class="form-control" value="{{ old('symbol', $editMode ? $currency->symbol : '') }}">
                                    <p class="help-block">@lang('ip.help_currency_symbol')</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.symbol_placement'): </label>
                                    <select name="placement" class="form-control">
                                        <option value="before" {{ old('placement', $editMode ? $currency->placement : '') == 'before' ? 'selected' : '' }}>{{ trans('ip.before_amount') }}</option>
                                        <option value="after" {{ old('placement', $editMode ? $currency->placement : '') == 'after' ? 'selected' : '' }}>{{ trans('ip.after_amount') }}</option>
                                    </select>
                                    <p class="help-block">@lang('ip.help_currency_symbol_placement')</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('ip.decimal_point'): </label>
                                    <input type="text" name="decimal" id="decimal" class="form-control" value="{{ old('decimal', $editMode ? $currency->decimal : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('ip.thousands_separator'): </label>
                                    <input type="text" name="thousands" id="thousands" class="form-control" value="{{ old('thousands', $editMode ? $currency->thousands : '') }}">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop