<?php
declare(strict_types=1);

namespace App\Forms\Http\Controllers;

use App\Forms\Http\Requests\SimpleFormStoreRequest;
use App\Forms\SimpleFormResult;
use App\Http\Controllers\Controller;
use App\Mail;
use Illuminate\Http\Request;

class SimpleFormController extends Controller
{
    public function store(string $code, SimpleFormStoreRequest $request)
    {
        if (!$code) {
            return abort(404);
        }
        $form = app()->make('App\Repositories\FormsRepository')->find($code);
        if (!$form) {
            return abort(404);
        }

        $form->process($request);
        $values = [];
        foreach ($form->fields() as $fieldCode => $field) {
            $values[$fieldCode] = $field->getValue();
        }
        $formResult = new SimpleFormResult();
        $formResult->setForm($form);
        $formResult->date = new \DateTime('now');
        $formResult->values = $values;

        $formResult->push();

        \Mail::to($form->getEmail())->send(new Mail\FormSubmittedAdmin($form, $formResult));

        if ($email = $form->getClientEmail()) {
            \Mail::to($form->getEmail())->send(new Mail\FormSubmittedClient($form, $formResult));
        }

        return redirect()->route('simple.form.ok');
    }

    public function success(Request $request)
    {
        \Menu::get('crumbs')->add('Сообщение отправлено', $request->path);
        return view('public.common.forms.ok-page');
    }
}
