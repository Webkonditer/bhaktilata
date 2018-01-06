<?php

namespace App\View\TableEditor\FormField;

use App\View\TableEditor\FormField;

class DateFormField extends FormField
{
    public function render()
    {
        return view('table-editor.fields.date', [
            'field' => $this,
        ]);
    }

    public function setValue($value)
    {
        parent::setValue(is_object($value) ? $value : \DateTime::createFromFormat('d.m.Y', $value));
    }

    protected function valueFromOldRequest()
    {
        $old = parent::valueFromOldRequest();
        return !is_null($old) ? \DateTime::createFromFormat('d.m.Y', $old) : null;
    }
}
