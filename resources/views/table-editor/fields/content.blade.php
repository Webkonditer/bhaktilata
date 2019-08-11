<div class="form-group {{ $field->hasErrors() ? 'has-error' : '' }}"">
    <label for="{{ $field->code() }}">{{ $field->caption() }}</label>
    <textarea id="{{ $field->code() }}"
              name="edit[{{ $field->code() }}]"
              rows="10"
              cols="80"
              class="js-editor-enabled">{{ $field->value() }}</textarea>
    @if ($field->hasErrors())
        @foreach($field->errors() as $error)
            <span class="help-block">{{ $error }}</span>
        @endforeach
    @endif
</div>