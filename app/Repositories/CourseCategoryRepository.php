<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Courses\CourseCategory;

class CourseCategoryRepository
{
    use AdminEditTrait;

    public function __construct()
    {
        $this->model = new CourseCategory();
    }

    public function published()
    {
        return CourseCategory::query()->where('status', 'published')->get();
    }

    public function findBySlug(string $slug): ?CourseCategory
    {
        return CourseCategory::query()->where('slug', '=', $slug)->firstOrFail();
    }
}
