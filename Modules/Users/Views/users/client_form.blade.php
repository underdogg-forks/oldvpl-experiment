@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {

        $('#client_id').change(function () {
          $.post('{{ route('users.clientInfo') }}', {
            id: $('#client_id').val()
          }).done(function (response) {
            $('#name').val(response.unique_name);
            $('#email').val(response.email);
          });
        });

      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('users.update', $user->id, 'client') }}">
    @csrf
    @method('PUT')
    @else
        <form method="POST" action="{{ route('users.store', 'client') }}">
    @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            {{ trans('ip.client') . ' ' . trans('ip.user_form') }}
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

                        @if (!$editMode)
                            <div class="form-group">
                                <label>@lang('ip.client'):</label>
                                {!! Form::select('client_id', ['' => ''] + $clients, null, ['class' => 'form-control', 'id' => 'client_id']) !!}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('ip.name'): </label>
                                    <input type="text" name="name" value="{{ old('name', $editMode ? $user->name : '') }}" id="name" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('ip.email'): </label>
                                    <input type="text" name="email" value="{{ old('email', $editMode ? $user->email : '') }}" id="email" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        @if (!$editMode)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('ip.password'): </label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('ip.password_confirmation'): </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>

                        @endif

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