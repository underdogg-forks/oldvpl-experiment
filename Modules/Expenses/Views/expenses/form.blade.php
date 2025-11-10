@extends('layouts.master')

@section('head')
    @include('layouts._datepicker')
    @include('layouts._typeahead')
    @include('clients._js_lookup')
    @include('expenses._js_vendor_lookup')
    @include('expenses._js_category_lookup')
@stop

@section('javascript')
    <script type="text/javascript">
      $(function () {
        $('#expense_date').datepicker({format: '{{ config('fi.datepickerFormat') }}', autoclose: true});
      });
    </script>
@stop

@section('content')

    @if ($editMode == true)
        <form method="POST" action="{{ route('expenses.update', $expense->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
            @csrf
    @endif

    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.expense_form')
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

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>* @lang('ip.company_profile'): </label>
                                    {!! Form::select('company_profile_id', $companyProfiles, (($editMode) ? $expense->company_profile_id : config('fi.defaultCompanyProfile')), ['id' => 'company_profile_id', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>* @lang('ip.date'): </label>
                                    <input type="text" name="expense_date" value="{{ old('expense_date', (($editMode) }}" id="expense_date" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>* @lang('ip.category'): </label>
                                    <input type="text" name="category_name" value="{{ old('category_name', $editMode ? $expense->category_name : '') }}" id="category_name" class="form-control category-lookup">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>* @lang('ip.amount'): </label>
                                    <input type="text" name="amount" value="{{ old('amount', (($editMode) }}" id="amount" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>@lang('ip.tax'): </label>
                                    <input type="text" name="tax" value="{{ old('tax', (($editMode) }}" id="amount" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.vendor'): </label>
                                    <input type="text" name="vendor_name" value="{{ old('vendor_name', $editMode ? $expense->vendor_name : '') }}" id="vendor_name" class="form-control vendor-lookup">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('ip.client'): </label>
                                    <input type="text" name="client_name" value="{{ old('client_name', $editMode ? $expense->client_name : '') }}" id="client_name" class="form-control client-lookup">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>@lang('ip.description'): </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $editMode ? $expense->description : '') }}</textarea>
                        </div>

                        @if ($customFields->count())
                            @include('custom_fields._custom_fields')
                        @endif

                        @if (!$editMode)
                            @if (!config('app.demo'))
                                <div class="form-group">
                                    <label>@lang('ip.attach_files'): </label>
                                    <input type="file" name="attachments[]" id="attachments" class="form-control">
                                </div>
                            @endif
                        @else
                            @include('attachments._table', ['object' => $expense, 'model' => 'Modules\Expenses\Models\Expense'])
                        @endif
                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop