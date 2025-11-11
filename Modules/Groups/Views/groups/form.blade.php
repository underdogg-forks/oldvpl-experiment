@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('groups.update', $group->id) }}">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('groups.store') }}">
            @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.group_form')
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
                            <input type="text" name="name" value="{{ old('name', $editMode ? $group->name : '') }}" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.format'): </label>
                            <input type="text" name="format" value="{{ old('format', $editMode ? $group->format : '') }}" id="format" class="form-control">
                            <span class="help-block">@lang('ip.available_fields'): {NUMBER} {YEAR} {MONTH} {MONTHSHORTNAME} {WEEK}</span>
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.next_number'): </label>
                            <input type="text" name="next_id" value="{{ old('next_id', isset($group->next_id) }}" id="next_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.left_pad'): </label>
                            <input type="text" name="left_pad" value="{{ old('left_pad', isset($group->left_pad) }}" id="left_pad" class="form-control">
                            <span class="help-block">@lang('ip.left_pad_description')</span>
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.reset_number'): </label>
                            <select name="reset_number" id="reset_number" class="form-control">
    @foreach($resetNumberOptions as $key => $value)
        <option value="{{ $key }}" {{ old('reset_number', $editMode ? $group->reset_number : '') == $key ? 'selected' : '' }}>{{ $value }</option>
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