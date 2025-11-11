@extends('layouts.master')

@section('content')

    <script type="text/javascript">
      $(function () {
        $('#name').focus();
      });
    </script>

    @if ($editMode == true)
        <form method="POST" action="{{ route('paymentMethods.update', $paymentMethod->id) }}">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('paymentMethods.store') }}">
            @csrf
    @endif

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.payment_method_form')
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

                        <div class="control-group">
                            <label>@lang('ip.payment_method'): </label>
                            <input type="text" name="name" value="{{ old('name', $editMode ? $paymentMethod->name : '') }}" id="name" class="form-control">
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>
@stop