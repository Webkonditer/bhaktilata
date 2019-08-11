<?php

namespace App\Factories;

use App\Forms\Fields;
use App\Forms\Form;

class FormsFactory
{
    public function fromConfig($code, $config)
    {
        $class = !empty($config['customClass']) ? $config['customClass'] : Form::class;
        $form = new $class($code, Form::TYPE_POST, !empty($config['parameters']) ? $config['parameters'] : []);
        $form->setTitle($config['title']);

        foreach ($config['fields'] as $fieldCode => $fieldParameters) {
            $field = $this->createField($fieldCode, $fieldParameters);
            $form->addField($field);
        }

        if (!empty($config['send_to'])) {
            $form->sendTo($config['send_to']);
        }

        if (!empty($config['send_to_client'])) {
            $form->setClientEmailField($config['send_to_client']);
        }

        $form->setSubmit($config['submit'], route('simple.form.store', ['code' => $code]));
        return $form;
    }

    private function createField($code, $parameters)
    {
        $type = !empty($parameters['type']) ? $parameters['type'] : null;
        if (!$type) {
            throw new \RuntimeException('Не указан тип поля');
        }
        switch ($type) {
            case 'string':
                return new Fields\StringField($code, $parameters);
            case 'email':
                return new Fields\EmailField($code, $parameters);
            case 'text':
                return new Fields\TextField($code, $parameters);
            case 'hidden':
                return new Fields\HiddenField($code, $parameters);
            default:
                throw new \RuntimeException('Не удалось найти тип поля [' . $type .']');
        }
    }
}

