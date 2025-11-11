@include('invoices._js_edit')

<section class="content-header">
    <h1 class="pull-left">@lang('ip.invoice') #{{ $invoice->number }}</h1>

    @if ($invoice->viewed)
        <span style="margin-left: 10px;" class="label label-success">@lang('ip.viewed')</span>
    @else
        <span style="margin-left: 10px;" class="label label-default">@lang('ip.not_viewed')</span>
    @endif

    @if ($invoice->quote()->count())
        <span class="label label-info"><a href="{{ route('quotes.edit', [$invoice->quote->id]) }}"
                                          style="color: inherit;">@lang('ip.converted_from_quote') {{ $invoice->quote->number }}</a></span>
    @endif

    <div class="pull-right">

        <a href="{{ route('invoices.pdf', [$invoice->id]) }}" target="_blank" id="btn-pdf-invoice"
           class="btn btn-default"><i class="fa fa-print"></i> @lang('ip.pdf')</a>
        @if (config('ip.mail_configured'))
            <a href="javascript:void(0)" id="btn-email-invoice" class="btn btn-default email-invoice"
               data-invoice-id="{{ $invoice->id }}" data-redirect-to="{{ route('invoices.edit', [$invoice->id]) }}"><i
                        class="fa fa-envelope"></i> @lang('ip.email')</a>
        @endif

        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                @lang('ip.other') <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                @if ($invoice->isPayable or config('ip.allow_payments_without_balance'))
                    <li><a href="javascript:void(0)" id="btn-enter-payment" class="enter-payment"
                           data-invoice-id="{{ $invoice->id }}"
                           data-invoice-balance="{{ $invoice->amount->formatted_numeric_balance }}"
                           data-redirect-to="{{ route('invoices.edit', [$invoice->id]) }}"><i
                                    class="fa fa-credit-card"></i> @lang('ip.enter_payment')</a></li>
                @endif
                <li><a href="javascript:void(0)" id="btn-copy-invoice"><i
                                class="fa fa-copy"></i> @lang('ip.copy')</a></li>
                <li><a href="{{ route('clientCenter.public.invoice.show', [$invoice->url_key]) }}" target="_blank"><i
                                class="fa fa-globe"></i> @lang('ip.public')</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('invoices.delete', [$invoice->id]) }}"
                       onclick="return confirm('@lang('ip.delete_record_warning')');"><i
                                class="fa fa-trash-o"></i> @lang('ip.delete')</a></li>
            </ul>
        </div>

        <div class="btn-group">
            @if ($returnUrl)
                <a href="{{ $returnUrl }}" class="btn btn-default"><i
                            class="fa fa-backward"></i> @lang('ip.back')</a>
            @endif
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-save-invoice"><i
                        class="fa fa-save"></i> @lang('ip.save')</button>
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li><a href="#" class="btn-save-invoice"
                       data-apply-exchange-rate="1">@lang('ip.save_and_apply_exchange_rate')</a></li>
            </ul>
        </div>

    </div>

    <div class="clearfix"></div>
</section>

<section class="content">

    <div class="row">

        <div class="col-lg-10">

            <div id="form-status-placeholder"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">@lang('ip.summary')</h3>
                        </div>
                        <div class="box-body">
                            <input type="text" name="summary" value="{{ old('summary', $invoice->summary) }}" id="summary" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-6" id="col-from">

                    @include('invoices._edit_from')

                </div>

                <div class="col-sm-6" id="col-to">

                    @include('invoices._edit_to')

                </div>

            </div>

            <div class="row">

                <div class="col-sm-12 table-responsive" style="overflow-x: visible;">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">@lang('ip.items')</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-primary btn-sm" id="btn-add-item"><i
                                            class="fa fa-plus"></i> @lang('ip.add_item')</button>
                            </div>
                        </div>

                        <div class="box-body">
                            <table id="item-table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 20%;">@lang('ip.product')</th>
                                    <th style="width: 25%;">@lang('ip.description')</th>
                                    <th style="width: 10%;">@lang('ip.qty')</th>
                                    <th style="width: 10%;">@lang('ip.price')</th>
                                    <th style="width: 10%;">{{ trans('ip.tax_1') }}</th>
                                    <th style="width: 10%;">{{ trans('ip.tax_2') }}</th>
                                    <th style="width: 10%; text-align: right; padding-right: 25px;">@lang('ip.total')</th>
                                    <th style="width: 5%;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="new-item" style="display: none;">
                                    <td>
                                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                        <input type="hidden" name="id" value="">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"><br>
                                        <label><input type="checkbox" name="save_item_as_lookup"
                                                      tabindex="999"> @lang('ip.save_item_as_lookup')</label>
                                    </td>
                                    <td><textarea name="description" class="form-control" rows="1">{{ old('description') }}</textarea></td>
                                    <td><input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control"></td>
                                    <td><input type="text" name="price" value="{{ old('price') }}" class="form-control"></td>
                                    <td><select name="tax_rate_id" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('tax_rate_id', config('ip.item_tax_rate') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select></td>
                                    <td><select name="tax_rate_2_id" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('tax_rate_2_id', config('ip.item_tax2_rate') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($invoice->items as $item)
                                    <tr class="item" id="tr-item-{{ $item->id }}">
                                        <td>
                                            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="text" name="name" value="{{ old('name', $item->name) }}" class="form-control item-lookup">
                                        </td>
                                        <td><textarea name="description" class="form-control" rows="1">{{ old('description', $item->description) }}</textarea></td>
                                        <td><input type="text" name="quantity" value="{{ old('quantity', $item->formatted_quantity) }}" class="form-control"></td>
                                        <td><input type="text" name="price" value="{{ old('price', $item->formatted_numeric_price) }}" class="form-control"></td>
                                        <td><select name="tax_rate_id" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('tax_rate_id', $item->tax_rate_id) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select></td>
                                        <td><select name="tax_rate_2_id" class="form-control">
    @foreach($taxRates as $key => $value)
        <option value="{{ $key }}" {{ old('tax_rate_2_id', $item->tax_rate_2_id) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select></td>
                                        <td style="text-align: right; padding-right: 25px;">{{ $item->amount->formatted_subtotal }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default btn-delete-invoice-item"
                                               href="javascript:void(0);"
                                               title="@lang('ip.delete')" data-item-id="{{ $item->id }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-additional"
                                                  data-toggle="tab">@lang('ip.additional')</a></li>
                            <li><a href="#tab-notes" data-toggle="tab">@lang('ip.notes')</a></li>
                            <li><a href="#tab-attachments" data-toggle="tab">@lang('ip.attachments')</a></li>
                            <li><a href="#tab-payments" data-toggle="tab">@lang('ip.payments')</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab-additional">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>@lang('ip.terms_and_conditions')</label>
                                            <textarea name="terms" id="terms" class="form-control" rows="5">{{ old('terms', $invoice->terms) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>@lang('ip.footer')</label>
                                            <textarea name="footer" id="footer" class="form-control" rows="5">{{ old('footer', $invoice->footer) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                @if ($customFields->count())
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('custom_fields._custom_fields_unbound', ['object' => $invoice])
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="tab-pane" id="tab-notes">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @include('notes._notes', ['object' => $invoice, 'model' => 'Modules\Invoices\Models\Invoice', 'showPrivateCheckbox' => true, 'hideHeader' => true])
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-attachments">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @include('attachments._table', ['object' => $invoice, 'model' => 'Modules\Invoices\Models\Invoice'])
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-payments">
                                <table class="table table-hover">

                                    <thead>
                                    <tr>
                                        <th>@lang('ip.payment_date')</th>
                                        <th>@lang('ip.amount')</th>
                                        <th>@lang('ip.payment_method')</th>
                                        <th>@lang('ip.note')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($invoice->payments as $payment)
                                        <tr>
                                            <td>{{ $payment->formatted_paid_at }}</td>
                                            <td>{{ $payment->formatted_amount }}</td>
                                            <td>@if ($payment->paymentMethod) {{ $payment->paymentMethod->name }} @endif</td>
                                            <td>{{ $payment->note }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">

            <div id="div-totals">
                @include('invoices._edit_totals')
            </div>

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('ip.options')</h3>
                </div>

                <div class="box-body">

                    <div class="form-group">
                        <label>@lang('ip.invoice') #</label>
                        <input type="text" name="number" value="{{ old('number', $invoice->number) }}" id="number" class="form-control
                        input-sm">
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.date')</label>
                        <input type="text" name="invoice_date" value="{{ old('invoice_date', $invoice->formatted_invoice_date) }}" id="invoice_date" class="form-control input-sm">
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.due_date')</label>
                        <input type="text" name="due_at" value="{{ old('due_at', $invoice->formatted_due_at) }}" id="due_at" class="form-control input-sm">
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.discount')</label>
                        <div class="input-group">
                            <input type="text" name="discount" value="{{ old('discount', $invoice->formatted_numeric_discount) }}" id="discount" class="form-control input-sm">
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.currency')</label>
                        <select name="currency_code" id="currency_code" class="form-control input-sm">
    @foreach($currencies as $key => $value)
        <option value="{{ $key }}" {{ old('currency_code', $invoice->currency_code) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.exchange_rate')</label>
                        <div class="input-group">
                            <input type="text" name="exchange_rate" value="{{ old('exchange_rate', $invoice->exchange_rate) }}" id="exchange_rate" class="form-control input-sm">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-sm" id="btn-update-exchange-rate" type="button"
                                        data-toggle="tooltip" data-placement="left"
                                        title="@lang('ip.update_exchange_rate')"><i class="fa fa-refresh"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.status')</label>
                        <select name="invoice_status_id" id="invoice_status_id" class="form-control input-sm">
    @foreach($statuses as $key => $value)
        <option value="{{ $key }}" {{ old('invoice_status_id', $invoice->invoice_status_id) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                    </div>

                    <div class="form-group">
                        <label>@lang('ip.template')</label>
                        <select name="template" id="template" class="form-control input-sm">
    @foreach($templates as $key => $value)
        <option value="{{ $key }}" {{ old('template', $invoice->template) == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>