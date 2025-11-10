@section('javascript')
    @parent
    <script type="text/javascript">
      $(function () {

        $('#mailPassword').val('');

        updateEmailOptions();

        $('#mailDriver').change(function () {
          updateEmailOptions();
        });

        function updateEmailOptions () {

          $('.email-option').hide();

          mailDriver = $('#mailDriver').val();

          if (mailDriver == 'smtp') {
            $('.smtp-option').show();
          }
          else if (mailDriver == 'sendmail') {
            $('.sendmail-option').show();
          }
          else if (mailDriver == 'mail') {
            $('.phpmail-option').show();
          }
        }

      });
    </script>
@stop

<div class="form-group">
    <label>@lang('ip.email_send_method'): </label>
    {!! Form::select('setting[mailDriver]', $emailSendMethods, config('fi.mailDriver'), ['id' => 'mailDriver', 'class' => 'form-control']) !!}
</div>

<div class="row smtp-option email-option">
    <div class="col-md-9">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_host_address'): </label>
            <input type="text" name="setting[mailHost]" value="{{ old('setting[mailHost]', config('fi.mailHost') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_host_port'): </label>
            <input type="text" name="setting[mailPort]" value="{{ old('setting[mailPort]', config('fi.mailPort') }}" class="form-control">
        </div>
    </div>
</div>
<div class="row smtp-option email-option">
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_username'): </label>
            <input type="text" name="setting[mailUsername]" value="{{ old('setting[mailUsername]', config('fi.mailUsername') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_password'): </label>
            <input type="password" name="setting[mailPassword]" id="mailPassword" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_encryption'): </label>
            {!! Form::select('setting[mailEncryption]', $emailEncryptions, config('fi.mailEncryption'), ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.allow_self_signed_cert'): </label>
            {!! Form::select('setting[mailAllowSelfSignedCertificate]', $yesNoArray, config('fi.mailAllowSelfSignedCertificate'), ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group sendmail-option email-option">
    <div class="form-group">
        <label>@lang('ip.sendmail_path'): </label>
        <input type="text" name="setting[mailSendmail]" value="{{ old('setting[mailSendmail]', config('fi.mailSendmail') }}" class="form-control">
    </div>
</div>

<div class="row smtp-option sendmail-option phpmail-option email-option">
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.always_attach_pdf'): </label>
            {!! Form::select('setting[attachPdf]', $yesNoArray, config('fi.attachPdf'), ['id' => 'attachPdf', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.reply_to_address'): </label>
            <input type="text" name="setting[mailReplyToAddress]" value="{{ old('setting[mailReplyToAddress]', config('fi.mailReplyToAddress') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.always_cc'): </label>
            <input type="text" name="setting[mailDefaultCc]" value="{{ old('setting[mailDefaultCc]', config('fi.mailDefaultCc') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.always_bcc'): </label>
            <input type="text" name="setting[mailDefaultBcc]" value="{{ old('setting[mailDefaultBcc]', config('fi.mailDefaultBcc') }}" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.quote_email_subject'): </label>
            <input type="text" name="setting[quoteEmailSubject]" value="{{ old('setting[quoteEmailSubject]', config('fi.quoteEmailSubject') }}" class="form-control">
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.invoice_email_subject'): </label>
            <input type="text" name="setting[invoiceEmailSubject]" value="{{ old('setting[invoiceEmailSubject]', config('fi.invoiceEmailSubject') }}" class="form-control">
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.default_quote_email_body'): </label>
            <textarea name="setting[quoteEmailBody]" class="form-control" rows="5">{{ old('setting[quoteEmailBody]', config('fi.quoteEmailBody') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.default_invoice_email_body'): </label>
            <textarea name="setting[invoiceEmailBody]" class="form-control" rows="5">{{ old('setting[invoiceEmailBody]', config('fi.invoiceEmailBody') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.overdue_email_subject'): </label>
            <input type="text" name="setting[overdueInvoiceEmailSubject]" value="{{ old('setting[overdueInvoiceEmailSubject]', config('fi.overdueInvoiceEmailSubject') }}" class="form-control">
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.upcoming_payment_notice_email_subject'): </label>
            <input type="text" name="setting[upcomingPaymentNoticeEmailSubject]" value="{{ old('setting[upcomingPaymentNoticeEmailSubject]', config('fi.upcomingPaymentNoticeEmailSubject') }}" class="form-control">
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.default_overdue_invoice_email_body'): </label>
            <textarea name="setting[overdueInvoiceEmailBody]" class="form-control" rows="5">{{ old('setting[overdueInvoiceEmailBody]', config('fi.overdueInvoiceEmailBody') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.upcoming_payment_notice_email_body'): </label>
            <textarea name="setting[upcomingPaymentNoticeEmailBody]" class="form-control" rows="5">{{ old('setting[upcomingPaymentNoticeEmailBody]', config('fi.upcomingPaymentNoticeEmailBody') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.overdue_invoice_reminder_frequency'): </label>
            <input type="text" name="setting[overdueInvoiceReminderFrequency]" value="{{ old('setting[overdueInvoiceReminderFrequency]', config('fi.overdueInvoiceReminderFrequency') }}" class="form-control">
            <span class="help-block">@lang('ip.overdue_invoice_reminder_frequency_help')</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.upcoming_payment_notice_frequency'): </label>
            <input type="text" name="setting[upcomingPaymentNoticeFrequency]" value="{{ old('setting[upcomingPaymentNoticeFrequency]', config('fi.upcomingPaymentNoticeFrequency') }}" class="form-control">
            <span class="help-block">@lang('ip.upcoming_payment_notice_frequency_help')</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.quote_approved_email_body'): </label>
            <textarea name="setting[quoteApprovedEmailBody]" class="form-control" rows="5">{{ old('setting[quoteApprovedEmailBody]', config('fi.quoteApprovedEmailBody') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.quote_rejected_email_body'): </label>
            <textarea name="setting[quoteRejectedEmailBody]" class="form-control" rows="5">{{ old('setting[quoteRejectedEmailBody]', config('fi.quoteRejectedEmailBody') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label>@lang('ip.payment_receipt_email_subject'): </label>
    <input type="text" name="setting[paymentReceiptEmailSubject]" value="{{ old('setting[paymentReceiptEmailSubject]', config('fi.paymentReceiptEmailSubject') }}" class="form-control">
    <span class="help-block"><a
                href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#payment-receipt-email-template"
                target="_blank">@lang('ip.available_fields')</a></span>
</div>

<div class="form-group">
    <label>@lang('ip.default_payment_receipt_body'): </label>
    <textarea name="setting[paymentReceiptBody]" class="form-control" rows="5">{{ old('setting[paymentReceiptBody]', config('fi.paymentReceiptBody') }}</textarea>
    <span class="help-block"><a
                href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#payment-receipt-email-template"
                target="_blank">@lang('ip.available_fields')</a></span>
</div>