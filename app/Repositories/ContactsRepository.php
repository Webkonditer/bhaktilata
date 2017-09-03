<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Domain\Contacts\Contact;
use Illuminate\Support\Collection;

class ContactsRepository
{
    use AdminEditTrait;

    public function __construct()
    {
        $this->model = new Contact();
    }

    public function findById(string $id): ?Contact
    {
        return Contact::query()->where('id', '=', $id)->firstOrFail();
    }

    public function getContactsFromSection($sectionId): Collection
    {
        return Contact::query()->where('section', (int)$sectionId)->get() ?: collect([]);
    }

    public function makeNew()
    {
        return new Contact([
            'place' => '',
            'name' => '',
            'email' => '',
            'section' => 0,
        ]);
    }
}
