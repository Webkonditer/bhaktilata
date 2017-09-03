<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Contacts;

use App\Domain\Contacts\Contact;
use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function add(ContactsRepository $repository)
    {
        $user = \Auth::user();
        $contact = $repository->getDraft($user);
        if (!$contact) {
            $contact = $repository->makeNew();
            $contact->setUser($user);
            $repository->save($contact);
        }
        return redirect()->route('admin.contact.edit', ['contact' => $contact]);
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', [
            'contact' => $contact,
            'categories' => Contact::getSectionsList(),
        ]);
    }

    public function store(Contact $contact, ContactsRepository $repository, Request $request)
    {
        $data = $request->get('edit');
        $contact->fill($data);
        $contact->setPublishStatus(isset($data['published']));
        $contact->setUser(\Auth::user());
        $repository->save($contact);
        return redirect()->route('admin.contacts.list');
    }

    public function delete(Contact $contact, ContactsRepository $repository)
    {
        $contact->setUser(\Auth::user());
        $repository->remove($contact);

        return redirect()->route('admin.contacts.list');
    }
}
