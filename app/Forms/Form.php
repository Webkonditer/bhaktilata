<?php
declare(strict_types=1);

namespace App\Forms;

use Illuminate\Http\Request;

class Form implements FormInterface
{
    const TYPE_POST = 'POST';
    const TYPE_GET = 'GET';
    /** @var FieldInterface[] */
    protected $fields;
    private $title;
    private $submitText;
    private $action;
    private $email;
    /**
     * @var string
     */
    private $method;
    /**
     * @var string
     */
    private $code;
    /**
     * @var array
     */
    private $parameters = [];
    private $clientEmailField;

    public function __construct(string $code, $method = Form::TYPE_POST, array $parameters = [])
    {
        if (!in_array($method, [Form::TYPE_POST, Form::TYPE_GET])) {
            throw new \RuntimeException('Неподдерживаемый тип формы [' . $method . "] допустимы только " . Form::TYPE_POST . ", " . Form::TYPE_GET);
        }
        $this->method = $method;
        $this->code = $code;
        $this->parameters = $parameters;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function addField(FieldInterface $field)
    {
        $this->fields[$field->getCode()] = $field;
        $field->setParent($this);
    }

    public function fields()
    {
        return $this->fields;
    }

    public function visibleFields()
    {
        return array_filter($this->fields, function ($f) { return $f->isVisible(); });
    }

    public function hiddenFields()
    {
        return array_filter($this->fields, function ($f) { return !$f->isVisible(); });
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setSubmit(string $text, string $action)
    {
        $this->submitText = $text;
        $this->action = $action;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getSubmitText()
    {
        return $this->submitText;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function rules()
    {
        $rules = [];

        foreach ($this->fields as $code => $field) {
            $rules[$code] = $field->rules();
        }

        return $rules;
    }

    public function render()
    {
        $this->process(\Request::instance());
        return view('public.common.forms.form', [
            'form' => $this,
        ]);
    }

    public function process(Request $request)
    {
        if ($request->session()->has('errors')) {
            $this->processErrors($request);
        } else {
            $this->processMain($request);
        }

    }

    private function processErrors(Request $request)
    {
        $messages = $request->session()->get('errors')->default;
        foreach ($this->fields() as $code => $field) {
            $field->setRawValue($request->old($code, null));
            if ($messages->has($code)) {
                $field->setErrorMessages($messages->get($code));
            }
        }
    }

    private function processMain(Request $request)
    {
        foreach ($this->fields() as $code => $field) {
            $field->setRawValue($request->get($code, null));
        }
    }

    public function getParameter(string $name)
    {
        return isset($this->parameters[$name]) ? $this->parameters[$name] : null;
    }

    public function getEmail()
    {
        return !empty($this->email) ? $this->email : null;
    }

    public function sendTo($email)
    {
        $this->email = $email;
    }

    public function setClientEmailField($field)
    {
        $this->clientEmailField = $field;
    }

    public function getClientEmail()
    {
        if (empty($this->clientEmailField)) {
            return null;
        }
        $field = !empty($this->fields[$this->clientEmailField]) ? $this->fields[$this->clientEmailField] : null;
        if (!$field) {
            return null;
        }

        return $field->getValue();
    }
}
