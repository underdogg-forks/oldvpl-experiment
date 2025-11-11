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
    <select name="setting[mailDriver]" id="mailDriver" class="form-control">
    @foreach($emailSendMethods as $key => $value)
        <option value="{{ $key }}" {{ old('setting[mailDriver]', config('ip.mail_driver') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="row smtp-option email-option">
    <div class="col-md-9">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_host_address'): </label>
            <input type="text" name="setting[mailHost]" value="{{ old('setting[mailHost]', config('ip.mail_host') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_host_port'): </label>
            <input type="text" name="setting[mailPort]" value="{{ old('setting[mailPort]', config('ip.mail_port') }}" class="form-control">
        </div>
    </div>
</div>
<div class="row smtp-option email-option">
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.smtp_username'): </label>
            <input type="text" name="setting[mailUsername]" value="{{ old('setting[mailUsername]', config('ip.mail_username') }}" class="form-control">
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
            <select name="setting[mailEncryption]" class="form-control">
    @foreach($emailEncryptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[mailEncryption]', config('ip.mail_encryption') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option email-option">
            <label>@lang('ip.allow_self_signed_cert'): </label>
            <select name="setting[mailAllowSelfSignedCertificate]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[mailAllowSelfSignedCertificate]', config('ip.mail_allow_self_signed_certificate') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
</div>

<div class="form-group sendmail-option email-option">
    <div class="form-group">
        <label>@lang('ip.sendmail_path'): </label>
        <input type="text" name="setting[mailSendmail]" value="{{ old('setting[mailSendmail]', config('ip.mail_sendmail') }}" class="form-control">
    </div>
</div>

<div class="row smtp-option sendmail-option phpmail-option email-option">
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.always_attach_pdf'): </label>
            <select name="setting[attachPdf]" id="attachPdf" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[attachPdf]', config('ip.attach_pdf') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.reply_to_address'): </label>
            <input type="text" name="setting[mailReplyToAddress]" value="{{ old('setting[mailReplyToAddress]', config('ip.mail_reply_to_address') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.always_cc'): </label>
            <input type="text" name="setting[mailDefaultCc]" value="{{ old('setting[mailDefaultCc]', config('ip.mail_default_cc') }}" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group smtp-option sendmail-option phpmail-option email-option">
            <label>@lang('ip.always_bcc'): </label>
            <input type="text" name="setting[mailDefaultBcc]" value="{{ old('setting[mailDefaultBcc]', config('ip.mail_default_bcc') }}" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.quote_email_subject'): </label>
            <input type="text" name="setting[quoteEmailSubject]" value="{{ old('setting[quoteEmailSubject]', config('ip.quote_email_subject') }}" class="form-control">
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.invoice_email_subject'): </label>
            <input type="text" name="setting[invoiceEmailSubject]" value="{{ old('setting[invoiceEmailSubject]', config('ip.invoice_email_subject') }}" class="form-control">
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
            <textarea name="setting[quoteEmailBody]" class="form-control" rows="5">{{ old('setting[quoteEmailBody]', config('ip.quote_email_body') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.default_invoice_email_body'): </label>
            <textarea name="setting[invoiceEmailBody]" class="form-control" rows="5">{{ old('setting[invoiceEmailBody]', config('ip.invoice_email_body') }}</textarea>
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
            <input type="text" name="setting[overdueInvoiceEmailSubject]" value="{{ old('setting[overdueInvoiceEmailSubject]', config('ip.overdue_invoice_email_subject') }}" class="form-control">
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.upcoming_payment_notice_email_subject'): </label>
            <input type="text" name="setting[upcomingPaymentNoticeEmailSubject]" value="{{ old('setting[upcomingPaymentNoticeEmailSubject]', config('ip.upcoming_payment_notice_email_subject') }}" class="form-control">
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
            <textarea name="setting[overdueInvoiceEmailBody]" class="form-control" rows="5">{{ old('setting[overdueInvoiceEmailBody]', config('ip.overdue_invoice_email_body') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#invoice-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.upcoming_payment_notice_email_body'): </label>
            <textarea name="setting[upcomingPaymentNoticeEmailBody]" class="form-control" rows="5">{{ old('setting[upcomingPaymentNoticeEmailBody]', config('ip.upcoming_payment_notice_email_body') }}</textarea>
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
            <input type="text" name="setting[overdueInvoiceReminderFrequency]" value="{{ old('setting[overdueInvoiceReminderFrequency]', config('ip.overdue_invoice_reminder_frequency') }}" class="form-control">
            <span class="help-block">@lang('ip.overdue_invoice_reminder_frequency_help')</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.upcoming_payment_notice_frequency'): </label>
            <input type="text" name="setting[upcomingPaymentNoticeFrequency]" value="{{ old('setting[upcomingPaymentNoticeFrequency]', config('ip.upcoming_payment_notice_frequency') }}" class="form-control">
            <span class="help-block">@lang('ip.upcoming_payment_notice_frequency_help')</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.quote_approved_email_body'): </label>
            <textarea name="setting[quoteApprovedEmailBody]" class="form-control" rows="5">{{ old('setting[quoteApprovedEmailBody]', config('ip.quote_approved_email_body') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('ip.quote_rejected_email_body'): </label>
            <textarea name="setting[quoteRejectedEmailBody]" class="form-control" rows="5">{{ old('setting[quoteRejectedEmailBody]', config('ip.quote_rejected_email_body') }}</textarea>
            <span class="help-block"><a
                        href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#quote-email-template"
                        target="_blank">@lang('ip.available_fields')</a></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label>@lang('ip.payment_receipt_email_subject'): </label>
    <input type="text" name="setting[paymentReceiptEmailSubject]" value="{{ old('setting[paymentReceiptEmailSubject]', config('ip.payment_receipt_email_subject') }}" class="form-control">
    <span class="help-block"><a
                href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#payment-receipt-email-template"
                target="_blank">@lang('ip.available_fields')</a></span>
</div>

<div class="form-group">
    <label>@lang('ip.default_payment_receipt_body'): </label>
    <textarea name="setting[paymentReceiptBody]" class="form-control" rows="5">{{ old('setting[paymentReceiptBody]', config('ip.payment_receipt_body') }}</textarea>
    <span class="help-block"><a
                href="https://wiki.invoiceplane.com/en/2.0/customization/email-templates#payment-receipt-email-template"
                target="_blank">@lang('ip.available_fields')</a></span>
</div>