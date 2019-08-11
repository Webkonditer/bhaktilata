<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Courses\CourseCategory;
use App\Http\Controllers\Controller;
use App\Repositories\CourseCategoryRepository;

class CategoriesListController extends Controller
{
    public function index(CourseCategoryRepository $repository)
    {
        $coursesCategories = $repository->all();

        return view('admin.courses.categories.list', [
            'categories' => $coursesCategories,
        ]);
    }
}
