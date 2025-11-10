@extends('layouts.master')

@section('javascript')

    @include('layouts._datepicker')
    @include('payments._js_form')

@stop

@section('content')

    @if ($editMode == true)
        <form method="POST" action="{{ route('payments.update', $payment->id) }}">
            @csrf
            @method('PUT')
    @else
        <form method="POST" action="{{ route('payments.store') }}">
            @csrf
    @endif

    <input type="hidden" name="invoice_id" value="{{ old('invoice_id') }}">

    <section class="content-header">
        <h1 class="pull-left">
            @lang('ip.payment_form')
        </h1>

        <div class="pull-right">
            <a href="{{ route('payments.index') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ trans('ip.save' }}</button>
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
                            <label>@lang('ip.amount'): </label>
                            <input type="text" name="amount" value="{{ old('amount', $payment->formatted_numeric_amount) }}" id="amount" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.payment_date'): </label>
                            <input type="text" name="paid_at" value="{{ old('paid_at', $payment->formatted_paid_at) }}" id="paid_at" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.payment_method')</label>
                            {!! Form::select('payment_method_id', $paymentMethods, null, ['id' =>
                            'payment_method_id', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>@lang('ip.note')</label>
                            <textarea name="note" id="note" class="form-control">{{ old('note', $editMode ? $payment->note : '') }}</textarea>
                        </div>

                        @if ($customFields->count())
                            @include('custom_fields._custom_fields')
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>

    <section class="content">
        @include('notes._notes', ['object' => $payment, 'model' => 'Modules\Payments\Models\Payment', 'showPrivateCheckbox' => true])
    </section>
@stop