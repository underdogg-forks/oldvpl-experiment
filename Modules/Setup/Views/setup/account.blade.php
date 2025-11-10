@extends('setup.master')

@section('content')

    <section class="content-header">
        <h1>@lang('ip.account_setup')</h1>
    </section>

    <section class="content">

        <form method="POST" action="{{ route('setup.postAccount') }}" class="form-install">
    @csrf

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-body">

                        @include('layouts._alerts')

                        <h4>@lang('ip.user_account')</h4>

                        <div class="row">

                            <div class="col-md-3 form-group">
                                <input type="text" name="user[name]" value="{{ old('user[name]') }}" class="form-control">
                            </div>

                            <div class="col-md-3 form-group">
                                <input type="text" name="user[email]" value="{{ old('user[email]') }}" class="form-control">
                            </div>

                            <div class="col-md-3 form-group">
                                <input type="password" name="user[password]" class="form-control">
                            </div>

                            <div class="col-md-3 form-group">
                                <input type="password" name="user[password_confirmation]" class="form-control">
                            </div>

                        </div>

                        <h4>@lang('ip.company_profile')</h4>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="company_profile[company]" value="{{ old('company_profile[company]') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <textarea name="company_profile[address]" class="form-control" rows="4">{{ old('company_profile[address]') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="company_profile[city]" value="{{ old('company_profile[city]') }}" id="city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="company_profile[state]" value="{{ old('company_profile[state]') }}" id="state" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="company_profile[zip]" value="{{ old('company_profile[zip]') }}" id="zip" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="company_profile[country]" value="{{ old('company_profile[country]') }}" id="country" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3 form-group">
                                <input type="text" name="company_profile[phone]" value="{{ old('company_profile[phone]') }}" class="form-control">
                            </div>

                            <div class="col-md-3 form-group">
                                <input type="text" name="company_profile[mobile]" value="{{ old('company_profile[mobile]') }}" class="form-control">
                            </div>

                            <div class="col-md-3 form-group">
                                <input type="text" name="company_profile[fax]" value="{{ old('company_profile[fax]') }}" class="form-control">
                            </div>

                            <div class="col-md-3 form-group">
                                <input type="text" name="company_profile[web]" value="{{ old('company_profile[web]') }}" class="form-control">
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