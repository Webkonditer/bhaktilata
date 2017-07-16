<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Pages\Page;
use App\User;

class PageRepository
{
    public function all()
    {
        return Page::all();
    }

    public function findById(string $id): ?Page
    {
        return Page::query()->where('id', '=', $id)->firstOrFail();
    }

    public function findByPath(string $slug): ?Page
    {
        return Page::query()->where('status', '=', Page::STATUS_PUBLISHED)->where('path', '=', $slug)->firstOrFail();
    }

    public function getDraft(User $user)
    {
        return Page::query()->where('status', '=', 'draft')->where('user_id', '=', $user->id)->first();
    }

    public function makeNew()
    {
        return new Page([
            'title' => '',
            'path' => '',
        ]);
    }

    public function save(Page $course)
    {
        return $course->save();
    }
}
