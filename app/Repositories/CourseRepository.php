<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Courses\Course;
use App\Courses\CourseCategory;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    use AdminEditTrait;

    public function __construct()
    {
        $this->model = new Course();
    }

    public function findById(string $id): ?Course
    {
        return Course::query()->where('id', '=', $id)->firstOrFail();
    }

    public function findBySlug(string $slug): ?Course
    {
        return Course::query()->where('slug', '=', $slug)->firstOrFail();
    }

    public function inCategory(CourseCategory $category): ?Collection
    {
        return Course::query()->where('category_id', '=', $category->id)->get();
    }
}
