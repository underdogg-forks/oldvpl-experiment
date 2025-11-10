<script type="text/javascript">
  $(function () {
    autosize($('textarea.custom-form-field'));
  });
</script>

@foreach ($customFields as $customField)
    <div class="form-group">
        <label>{{ $customField->field_label }}</label>
        @if ($customField->field_type == 'dropdown')
            <select name="custom[{{ $customField->column_name }}]" class="custom-form-field form-control" data-{{ $customField->tbl_name }}-field-name="{{ $customField->column_name }}">
                @foreach(array_combine(array_merge([''], explode(',', $customField->field_meta)), array_merge([''], explode(',', $customField->field_meta))) as $optKey => $optValue)
                    <option value="{{ $optKey }}" {{ old('custom.' . $customField->column_name) == $optKey ? 'selected' : '' }}>{{ $optValue }}</option>
                @endforeach
            </select>
        @elseif ($customField->field_type == 'textarea')
            <textarea name="custom[{{ $customField->column_name }}]" class="custom-form-field form-control" data-{{ $customField->tbl_name }}-field-name="{{ $customField->column_name }}">{{ old('custom.' . $customField->column_name) }}</textarea>
        @else
            <input type="{{ $customField->field_type }}" name="custom[{{ $customField->column_name }}]" value="{{ old('custom.' . $customField->column_name) }}" class="custom-form-field form-control" data-{{ $customField->tbl_name }}-field-name="{{ $customField->column_name }}">
        @endif
    </div>
@endforeach