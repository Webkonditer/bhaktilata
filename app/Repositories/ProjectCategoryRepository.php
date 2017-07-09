<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Projects\ProjectCategory;

class ProjectCategoryRepository
{
    public function all()
    {
        return ProjectCategory::all();
    }

    public function firstLevel()
    {
        return ProjectCategory::query()->whereNull('parent_id')->get();
    }

    public function findBySlug(string $slug): ?ProjectCategory
    {
        return ProjectCategory::query()->where('slug', '=', $slug)->firstOrFail();
    }
}
