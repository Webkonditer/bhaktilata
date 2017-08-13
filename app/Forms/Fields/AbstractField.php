<?php
declare(strict_types=1);

namespace App\Forms\Fields;

use App\Forms\FieldInterface;
use App\Forms\FormInterface;

abstract class AbstractField implements FieldInterface
{
    /** @var string */
    protected $code;

    protected $value;

    /** @var array */
    protected $parameters;
    /** @var FormInterface */
    protected $parent;
    private $messages;

    public function __construct(string $code, array $parameters)
    {
        if (empty($code)) {
            throw new \RuntimeException('Немогу добавить поле без кода');
        }
        $this->code = $code;
        $this->parameters = $parameters;
    }

    abstract public function getType();

    public function isValid(): bool
    {
        return !empty($this->getValue());
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function render(): string
    {
        return view('public.common.forms.fields.' . $this->getType(), [
            'field' => $this
        ])->render();
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setRawValue($value)
    {
        $this->value = $value;
    }

    public function setParent(FormInterface $form)
    {
        $this->parent = $form;
    }

    public function rules()
    {
        if (!empty($this->parameters['required'])) {
            return 'required';
        }
        return '';
    }

    public function getName()
    {
        return $this->parent->getCode() . '_' . $this->getCode();
    }

    public function getCaption()
    {
        return isset($this->parameters['caption']) ? $this->parameters['caption'] : '';
    }

    public function getParameter($name)
    {
        return isset($this->parameters[$name]) ? $this->parameters[$name] : null;
    }

    public function isRequired()
    {
        return (bool) $this->getParameter('required');
    }

    public function setErrorMessages($messages)
    {
        $this->messages = $messages;
    }

    public function getErrors()
    {
        return $this->messages;
    }

    public function hasErrors()
    {
        return !empty($this->messages);
    }
}