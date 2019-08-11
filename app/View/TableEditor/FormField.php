<?php

namespace App\View\TableEditor;

use Illuminate\Http\Request;

class FormField
{
    /** @var string */
    private $code;
    /** @var string */
    private $caption;
    /** @var mixed */
    protected $value;
    /**
     * @var array
     */
    private $options;

    public function __construct(string $code, string $caption, array $options = [])
    {
        $this->code = $code;
        $this->caption = $caption;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function code(): string
    {
        return $this->code;
    }

    public function caption(): string
    {
        return $this->caption;
    }

    public function value()
    {
        $oldValue = $this->valueFromOldRequest();
        return !is_null($oldValue) ? $oldValue : $this->value;
    }

    public function hasErrors()
    {
        $e = \Request::instance()->session()->get('errors');
        return $e && $e->has('edit.' . $this->code());
    }

    public function errors()
    {
        $e = \Request::instance()->session()->get('errors');
        return $e ? $e->get('edit.' . $this->code()) : [];
    }

    protected function valueFromOldRequest()
    {
        $old = \Request::old('edit');
        return array_has($old, $this->code()) ?
            (array_get($old,$this->code(),'') ? array_get($old,$this->code(),'') : '') :
            null;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function fill($source)
    {
        if (isset($source[$this->code()])) {
            $this->setValue($source[$this->code()]);
        }
    }

    public function fillFromRequest(Request $request)
    {
        $this->fill($request->get('edit'));
    }

    public function getRules($formName)
    {
        $rules = [];
        if (!empty($this->options['rules'])) {
            foreach ($this->options['rules'] as $rule) {
                $rules[$formName . '.' . $this->code()] = $rule;
            }
        }
        return $rules;
    }

    public function render()
    {
        return view('table-editor.fields.string', [
            'field' => $this,
        ]);
    }
}
