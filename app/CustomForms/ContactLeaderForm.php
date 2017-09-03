<?php

namespace App\CustomForms;

use App\Forms\Form;

class ContactLeaderForm extends Form
{
    public function getEmail()
    {
        $email = parent::getEmail();
        $value = $this->fields['contact_id']->getValue();
        if (!empty($value)) {
            $contact = app()->make('App\Repositories\ContactsRepository')->findById($value);
            if ($contact) {
                $email = $contact->email;
            }
        }
        return $email;
    }

}
