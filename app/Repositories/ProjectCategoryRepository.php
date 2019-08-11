<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Projects\ProjectCategory;

class ProjectCategoryRepository
{
    use AdminEditTrait;

    public function __construct()
    {
        $this->model = new ProjectCategory();
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
