@extends('setup.master')

@section('content')

    <section class="content-header">
        <h1>@lang('ip.database_setup')</h1>
    </section>

    <section class="content">

        <form method="POST" action="{{ route('setup.postDbconfig') }}" class="form-install">
    @csrf

        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-body">

                        @include('layouts._alerts')

                        <h4>@lang('ip.database_setup')</h4>

                        <p>@lang('ip.database_configuration_info')</p>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">

                                <div class="form-group">
                                    <label for="db_host">@lang('ip.database_host')</label>
                                    <input type="text" name="db_host" value="{{ old('db_host', old('db_host') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="db_port">@lang('ip.database_port')</label>
                                    <input type="text" name="db_port" value="{{ old('db_port', old('db_port') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="db_database">@lang('ip.database_database')</label>
                                    <input type="text" name="db_database" value="{{ old('db_database', old('db_database') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="db_username">@lang('ip.database_user')</label>
                                    <input type="text" name="db_username" value="{{ old('db_username', old('db_username') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="db_password">@lang('ip.database_pass')</label>
                                    <input type="password" name="db_password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="db_prefix">@lang('ip.database_prefix')</label>
                                    <input type="text" name="db_prefix" value="{{ old('db_prefix', old('db_prefix') }}" class="form-control">
                                </div>

                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">@lang('ip.continue')</button>

                    </div>

                </div>

            </div>

        </div>

        </form>

    </section>

@stop