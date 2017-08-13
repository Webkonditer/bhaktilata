<?php

namespace App\Forms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimpleFormStoreRequest extends FormRequest
{
    public function rules()
    {
        $code = $this->get('formCode');
        if (!$code) {
            return [];
        }
        $form = app()->make('App\Repositories\FormsRepository')->find($code);
        if (!$form) {
            return [];
        }
        return $form->rules();
    }

    public function authorize()
    {
        return true;
    }
}