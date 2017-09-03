<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;
use App\Repositories\FormsRepository;

class ContactsController extends Controller
{
    public function leaders(ContactsRepository $repository, FormsRepository $formsRepository)
    {
        return view('public.contacts.leaders', [
            'contacts' => [
                1 => $repository->getContactsFromSection(1),
                2 => $repository->getContactsFromSection(2),
                3 => $repository->getContactsFromSection(3),
                4 => $repository->getContactsFromSection(4),
            ],
            'form' => $formsRepository->find('contacts.leaders'),
        ]);
    }
}
