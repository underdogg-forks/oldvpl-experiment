@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();

        $('#btn-generate-api-keys').click(function () {
          $.post("{{ route('api.generateKeys') }}", function (response) {
            $('#api_public_key').val(response.api_public_key);
            $('#api_secret_key').val(response.api_secret_key);
          });
        });

        $('#btn-clear-api-keys').click(function () {
          $('#api_public_key').val('');
          $('#api_secret_key').val('');
        });
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('users.update', $user->id, 'admin') }}">
    @csrf
    @method('PUT')
    @else
        <form method="POST" action="{{ route('users.store', 'admin') }}">
    @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            {{ trans('ip.admin') . ' ' . trans('ip.user_form') }}
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('ip.name'): </label>
                                    <input type="text" name="name" value="{{ old('name', $editMode ? $user->name : '') }}" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('ip.email'): </label>
                                    <input type="text" name="email" value="{{ old('email', $editMode ? $user->email : '') }}" id="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        @if (!$editMode)
                            <div class="form-group">
                                <label>@lang('ip.password'): </label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>@lang('ip.password_confirmation'): </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.api_public_key'): </label>
                                    <input type="text" name="api_public_key" value="{{ old('api_public_key', $editMode ? $user->api_public_key : '') }}" id="api_public_key" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('ip.api_secret_key'): </label>
                                    <input type="text" name="api_secret_key" value="{{ old('api_secret_key', $editMode ? $user->api_secret_key : '') }}" id="api_secret_key" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn-default"
                           id="btn-generate-api-keys">@lang('ip.generate_keys')</a>
                        <a href="#" class="btn btn-default" id="btn-clear-api-keys">@lang('ip.clear_keys')</a>

                    </div>

                </div>

                @if ($customFields->count())
                    <div class="box box-primary">

                        <div class="box-header">
                            <h3 class="box-title">@lang('ip.custom_fields')</h3>
                        </div>

                        <div class="box-body">

                            @include('custom_fields._custom_fields')

                        </div>

                    </div>
                @endif

            </div>

        </div>

    </section>

    </form>
@stop