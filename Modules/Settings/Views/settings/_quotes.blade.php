<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_quote_template'): </label>
            <select name="setting[quoteTemplate]" class="form-control">
    @foreach($quoteTemplates as $key => $value)
        <option value="{{ $key }}" {{ old('setting[quoteTemplate]', config('ip.quote_template') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_group'): </label>
            <select name="setting[quoteGroup]" class="form-control">
    @foreach($groups as $key => $value)
        <option value="{{ $key }}" {{ old('setting[quoteGroup]', config('ip.quote_group') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.quotes_expire_after'): </label>
            <input type="text" name="setting[quotesExpireAfter]" value="{{ old('setting[quotesExpireAfter]', config('ip.quotes_expire_after') }}" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.default_status_filter'): </label>
            <select name="setting[quoteStatusFilter]" class="form-control">
    @foreach($quoteStatuses as $key => $value)
        <option value="{{ $key }}" {{ old('setting[quoteStatusFilter]', config('ip.quote_status_filter') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>

</div>

<div class="form-group">
    <label>@lang('ip.convert_quote_when_approved'): </label>
    <select name="setting[convertQuoteWhenApproved]" class="form-control">
    @foreach($yesNoArray as $key => $value)
        <option value="{{ $key }}" {{ old('setting[convertQuoteWhenApproved]', config('ip.convert_quote_when_approved') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="form-group">
    <label>@lang('ip.convert_quote_setting'): </label>
    <select name="setting[convertQuoteTerms]" class="form-control">
    @foreach($convertQuoteOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[convertQuoteTerms]', config('ip.convert_quote_terms') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
</div>

<div class="form-group">
    <label>@lang('ip.default_terms'): </label>
    <textarea name="setting[quoteTerms]" class="form-control" rows="5">{{ old('setting[quoteTerms]', config('ip.quote_terms') }}</textarea>
</div>

<div class="form-group">
    <label>@lang('ip.default_footer'): </label>
    <textarea name="setting[quoteFooter]" class="form-control" rows="5">{{ old('setting[quoteFooter]', config('ip.quote_footer') }}</textarea>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.if_quote_is_emailed_while_draft'): </label>
            <select name="setting[resetQuoteDateEmailDraft]" class="form-control">
    @foreach($quoteWhenDraftOptions as $key => $value)
        <option value="{{ $key }}" {{ old('setting[resetQuoteDateEmailDraft]', config('ip.reset_quote_date_email_draft') == $key ? 'selected' : '' }}>{{ $value }</option>
    @endforeach
</select>
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('ip.recalculate_quotes'): </label><br>
            <button type="button" class="btn btn-default" id="btn-recalculate-quotes"
                    data-loading-text="@lang('ip.recalculating_wait')">@lang('ip.recalculate')</button>
            <p class="help-block">@lang('ip.recalculate_help_text')</p>
        </div>
    </div>
</div>