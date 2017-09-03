<?php
declare(strict_types=1);

namespace App\Forms\Fields;

class HiddenField extends AbstractField
{
    public function getType()
    {
        return 'hidden';
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

    public function isVisible(): bool
    {
        return false;
    }
}
