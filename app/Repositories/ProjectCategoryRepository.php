<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Courses\CourseCategory;

class CourseCategoryRepository
{
    public function all()
    {
        return CourseCategory::all();
    }

    public function findBySlug(string $slug): ?CourseCategory
    {
        return CourseCategory::query()->where('slug', '=', $slug)->firstOrFail();
    }
}
