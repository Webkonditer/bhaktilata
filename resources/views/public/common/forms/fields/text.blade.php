<textarea class="form-control"
          name="{{ $field->getCode() }}"
          id="{{ $field->getName() }}"
          rows="{{ $field->getParameter('rows') ?: 10 }}"
          placeholder="{{ $field->placeholder() }}">{{ $field->getValue() }}</textarea>