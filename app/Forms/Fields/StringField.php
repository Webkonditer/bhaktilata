<?php
declare(strict_types=1);

namespace App\Forms\Fields;

class StringField extends AbstractField
{
    public function getType()
    {
        return 'string';
    }

    public function isValue(): bool
    {
        // TODO: Implement isValue() method.
    }

    public function rules()
    {
        if (!empty($this->parameters['required'])) {
            return 'required';
        }
        return parent::rules();
    }
}
