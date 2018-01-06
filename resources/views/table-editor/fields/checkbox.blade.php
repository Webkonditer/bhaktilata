<div class="form-group {{ $field->hasErrors() ? 'has-error' : '' }}"">
    <div class="checkbox">
        <label for="{{ $field->code() }}">
            <input type="checkbox"
                   id="{{ $field->code() }}"
                   name="edit[{{ $field->code() }}]"
                   {{ $field->value() ? 'checked="checked"' : '' }}
            /> {{ $field->caption() }}
        </label>
    </div>
    @if ($field->hasErrors())
        @foreach($field->errors() as $error)
            <span class="help-block">{{ $error }}</span>
        @endforeach
    @endif
</div>