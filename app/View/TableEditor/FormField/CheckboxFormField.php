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

    public function fill($source)
    {
        $this->setValue(isset($source[$this->code()]));
    }


    public function setValue($value)
    {
        parent::setValue((is_bool($value) && $value)|| $value === 'on');
    }

    protected function valueFromOldRequest()
    {
        // TODO: Ниже живет баг: если форма восстанавливается из "old", и в old галка была не втыкнута, то будет показано последнее её сохранённое состояние, а не то, что пришло из old
        $old = \Request::old('edit.' . $this->code());
        return !is_null($old) ? \Request::old('edit.' . $this->code()) === 'on' : null;
    }
}
