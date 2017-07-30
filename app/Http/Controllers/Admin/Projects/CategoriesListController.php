<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectCategoryRepository;

class CategoriesListController extends Controller
{
    public function index(ProjectCategoryRepository $repository)
    {
        $coursesCategories = $repository->all();

        return view('admin.projects.categories.list', [
            'categories' => $coursesCategories,
        ]);
    }
}
