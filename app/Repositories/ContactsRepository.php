<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Domain\Contacts\Contact;
use Illuminate\Support\Collection;

class ContactsRepository
{
    use AdminEditTrait {
        queryAll as protected traitQueryAll;
    }

    public function __construct()
    {
        $this->model = new Contact();
    }

    protected function queryAll()
    {
        $query = $this->traitQueryAll() ;
        $this->buildOrderBy($query);
        return $query;
    }


    public function findById(string $id): ?Contact
    {
        return Contact::query()->where('id', '=', $id)->firstOrFail();
    }

    public function getContactsFromSection($sectionId): Collection
    {
        $query = Contact::query();
        return $this->buildOrderBy($query)->published($query)->where('section', (int)$sectionId)->get() ?: collect([]);
    }

    private function published($query)
    {
        return $query->where('status', Contact::STATUS_PUBLISHED);
    }

    private function buildOrderBy($query)
    {
        $query->orderBy(\DB::raw('sort = 0, sort'), 'ASC')->orderBy('place', 'ASC')->orderBy('created_at', 'ASC');
        return $this;
    }

    public function makeNew()
    {
        return new Contact([
            'place' => '',
            'name' => '',
            'email' => '',
            'section' => 0,
            'sort' => 0,
        ]);
    }
}
