<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;

class ListController extends Controller
{
    public function index(ContactsRepository $repository)
    {
        $contacts = $repository->all();

        return view('admin.contacts.list', [
            'contacts' => $contacts,
        ]);
    }
}
