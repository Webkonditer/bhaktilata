<?php

namespace App\View\TableEditor;

use Illuminate\Http\Request;

class Form
{
    /** @var FormField[] */
    private $fields;
    /** @var string */
    private $action;
    /** @var string */
    private $method;

    public function __construct(string $action = null, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function addField(FormField $field)
    {
        $this->fields[$field->code()] = $field;
    }

    public function setAction(string $action)
    {
        $this->action = $action;
    }

    public function action()
    {
        return $this->action;
    }

    public function method()
    {
        return $this->method;
    }

    public function render()
    {
        return view('table-editor.form', [
            'form' => $this,
        ]);
    }

    public function fields()
    {
        return $this->fields;
    }

    public function getRules()
    {
        $rules = [];
        $formName = 'edit';
        foreach ($this->fields as $field) {
            $fieldRules = $field->getRules($formName);
            if (!empty($fieldRules)) {
                $rules = array_merge($rules, $fieldRules);
            }
        }
        return $rules;
    }
}
