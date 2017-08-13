<?php
declare(strict_types=1);

namespace App\Forms\Fields;

class EmailField extends AbstractField
{
    public function getType()
    {
        return 'email';
    }

    public function isValid(): bool
    {
        return parent::isValid() && preg_match('^(.+)@(.+)\.(.+)$', $this->getValue());
    }

    public function rules()
    {
        return (!empty($this->parameters['required']) ? 'required' : '') . '|email';
    }
}
