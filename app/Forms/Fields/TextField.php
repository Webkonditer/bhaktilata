<?php
declare(strict_types=1);

namespace App\Forms\Fields;

class TextField extends AbstractField
{
    public function getType()
    {
        return 'text';
    }

    public function isValue(): bool
    {
        // TODO: Implement isValue() method.
    }
}
