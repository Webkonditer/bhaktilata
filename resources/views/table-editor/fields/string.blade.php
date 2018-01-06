<div class="form-group {{ $field->hasErrors() ? 'has-error' : '' }}">
    <label for="{{ $field->code() }}">{{ $field->caption() }}</label>
    <input type="text"
           name="edit[{{ $field->code() }}]"
           class="form-control"
           id="{{ $field->code() }}"
           value="{{ $field->value() }}"
    />
    @if ($field->hasErrors())
        @foreach($field->errors() as $error)
            <span class="help-block">{{ $error }}</span>
        @endforeach
    @endif
</div>