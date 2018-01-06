<div class="form-group {{ $field->hasErrors() ? 'has-error' : '' }}"">
    <label for="{{ $field->code() }}">{{ $field->caption() }}</label>
    <input type="file"
           name="edit[{{ $field->code() }}]"
           id="{{ $field->code() }}"
           value="{{ $field->value() }}"
    />
    @if($field->value())
        <a href="{{ \Storage::disk('public')->url($field->value()) }}" target="_blank" class="label label-success">
            Загруженный файл&nbsp;&nbsp;&nbsp;{{ $field->value() }}
        </a>
    @endif
    @if ($field->hasErrors())
        @foreach($field->errors() as $error)
            <span class="help-block">{{ $error }}</span>
        @endforeach
    @endif
</div>