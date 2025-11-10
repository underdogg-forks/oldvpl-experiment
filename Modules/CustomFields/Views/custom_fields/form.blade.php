@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('customFields.update', $customField->id) }}">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('customFields.store') }}">
            @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.custom_field_form')
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
                            <label>@lang('ip.table_name'): </label>
                            @if ($editMode == true)
                                <input type="text" name="tbl_name" value="{{ old('tbl_name', $tableNames[$customField->tbl_name]) }}" id="tbl_name" class="form-control" readonly>
                            @else
                                {!! Form::select('tbl_name', $tableNames, null, ['id' => 'tbl_name', 'class' => 'form-control']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.field_label'): </label>
                            <input type="text" name="field_label" value="{{ old('field_label', $editMode ? $customField->field_label : '') }}" id="field_label" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.field_type'): </label>
                            {!! Form::select('field_type', $fieldTypes, null, ['id' => 'field_type', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.field_meta'): </label>
                            <input type="text" name="field_meta" value="{{ old('field_meta', $editMode ? $customField->field_meta : '') }}" id="field_meta" class="form-control">
                            <span class="help-block">@lang('ip.field_meta_description')</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop