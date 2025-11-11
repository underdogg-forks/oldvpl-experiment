@extends('layouts.master')

@section('content')

    <form method="POST" action="{{ route('import.upload') }}" enctype="multipart/form-data">
    @csrf

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.import_data')
        </h1>
        <div class="pull-right">
            @if (!config('app.demo'))
                <button type="submit" class="btn btn-primary">{{ trans('ip.submit' }}</button>
            @endif
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="content">

        @include('layouts._alerts')

        <div class="row">

            <div class="col-xs-12">

                <div class="box box-primary">

                    <div class="box-body">

                        <div class="form-group">
                            <label>@lang('ip.what_to_import')</label>
                            <select name="import_type" class="form-control">
    @foreach($importTypes as $key => $value)
        <option value="{{ $key }}" {{ old('import_type') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.select_file_to_import')</label>
                            @if (!config('app.demo'))
                                <input type="file" name="import_file">
                            @else
                                Imports are disabled in the demo.
                            @endif
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop