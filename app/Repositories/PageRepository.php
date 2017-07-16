<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Pages\Page;
use App\User;

class PageRepository
{
    use AdminEditTrait;

    public function __construct()
    {
        $this->model = new Page();
    }

    public function findById(string $id): ?Page
    {
        return Page::query()->where('id', '=', $id)->firstOrFail();
    }

    public function findByPath(string $slug): ?Page
    {
        return Page::query()->where('status', '=', Page::STATUS_PUBLISHED)->where('path', '=', $slug)->firstOrFail();
    }

    public function makeNew()
    {
        return new Page([
            'title' => '',
            'path' => '',
        ]);
    }
}
