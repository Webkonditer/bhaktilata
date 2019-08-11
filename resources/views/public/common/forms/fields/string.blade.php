<?php
/**
 * @var \App\Forms\Fields\StringField $field
 */
?>
<input type="text"
       class="form-control"
       id="{{ $field->getName() }}"
       name="{{ $field->getCode() }}"
       placeholder="{{ $field->placeholder() }}"
       value="{{ $field->getValue() }}"
        />