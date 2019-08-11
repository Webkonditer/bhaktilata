<?php

namespace App\View\TableEditor\FormField;

use App\View\TableEditor\FormField;

class StringFormField extends FormField
{
    public function render()
    {
        return view('table-editor.fields.string', [
            'field' => $this,
        ]);
    }

    public function value()
    {
        return (string)parent::value();
    }
}
