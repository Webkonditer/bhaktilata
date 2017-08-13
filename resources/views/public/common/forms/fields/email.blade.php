<?php
/**
 * @var \App\Forms\Fields\StringField $field
 */
?>
<input type="email"
       class="form-control"
       id="{{ $field->getName() }}"
       name="{{ $field->getCode() }}"
       placeholder="Ваше E-mail"
       value="{{ $field->getValue() }}"
        />