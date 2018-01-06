<?php

namespace App\View\TableEditor\FormField;

use App\View\TableEditor\FormField;

class ContentFormField extends FormField
{
    public function render()
    {
        return view('table-editor.fields.content', [
            'field' => $this,
        ]);
    }

    public function value()
    {
        return (string)parent::value();
    }
}
