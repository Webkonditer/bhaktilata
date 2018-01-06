<?php

namespace App\View\TableEditor\FormField;

use App\View\TableEditor\FormField;

class CheckboxFormField extends FormField
{
    public function render()
    {
        return view('table-editor.fields.checkbox', [
            'field' => $this,
        ]);
    }

    public function setValue($value)
    {
        parent::setValue((bool) $value);
    }

    protected function valueFromOldRequest()
    {
        return \Request::old('edit.' . $this->code()) === 'on';
    }
}
