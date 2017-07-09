<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Projects\Project;
use App\Projects\ProjectCategory;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function all()
    {
        return Project::all();
    }

    public function findById(string $id): ?Project
    {
        return Project::query()->where('id', '=', $id)->firstOrFail();
    }

    public function findBySlug(string $slug): ?Project
    {
        return Project::query()->where('slug', '=', $slug)->firstOrFail();
    }

    public function inCategory(ProjectCategory $category): ?Collection
    {
        return Project::query()->where('category_id', '=', $category->id)->get();
    }

    public function save(Project $course)
    {
        return $course->save();
    }
}
