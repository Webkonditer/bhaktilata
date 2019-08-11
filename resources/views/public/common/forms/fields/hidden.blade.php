<?php
/**
 * @var \App\Forms\Fields\StringField $field
 */
?>
<input type="hidden"
       class="form-control"
       id="{{ $field->getName() }}"
       name="{{ $field->getCode() }}"
       placeholder="{{ $field->placeholder() }}"
       value="{{ $field->getValue() }}"
        />