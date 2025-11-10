@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#password').focus();
      });
    </script>

    <form method="POST" action="{{ route('users.password.update', $user->id) }}">
    @csrf

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.reset_password'): {{ $user->name }} ({{ $user->email }})
        </h1>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">{{ trans('ip.reset_password' }}</button>
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
                            <label>@lang('ip.password'): </label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.password_confirmation'): </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop