@extends('setup.master')

@section('content')

    <section class="content-header">
        <h1>@lang('ip.setup')</h1>
    </section>

    <section class="content">

        <form method="POST">
    @csrf

        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-body">

                        <p>@lang('ip.setup_welcome')</p>

                        <button type="submit" class="btn btn-primary">{{ trans('ip.continue' }}</button>

                    </div>
                </div>

            </div>
        </div>

        </form>

    </section>

@stop