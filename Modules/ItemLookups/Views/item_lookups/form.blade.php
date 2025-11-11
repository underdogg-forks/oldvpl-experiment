@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('itemLookups.update', $itemLookup->id) }}">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('itemLookups.store') }}">
            @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.item_lookup_form')
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
                            <label class="">@lang('ip.name'): </label>
                            <input type="text" name="name" value="{{ old('name', $editMode ? $itemLookup->name : '') }}" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="">@lang('ip.description'): </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $editMode ? $itemLookup->description : '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="">@lang('ip.price'): </label>
                            <input type="text" name="price" value="{{ old('price', (($editMode) }}" id="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="">{{ trans('ip.tax_1') }}: </label>
                            <select name="tax_rate_id" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('tax_rate_id', $editMode ? $itemLookup->tax_rate_id : '') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>

                        <div class="form-group">
                            <label class="">{{ trans('ip.tax_2') }}: </label>
                            <select name="tax_rate_2_id" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('tax_rate_2_id', $editMode ? $itemLookup->tax_rate_2_id : '') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop