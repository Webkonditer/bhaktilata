<?php
/**
 * @var \App\Forms\Fields\StringField $field
 */
?>
<input type="text"
       class="form-control"
       id="{{ $field->getName() }}"
       name="{{ $field->getCode() }}"
       placeholder="Ваше имя"
       value="{{ $field->getValue() }}"
        />