<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Courses\CourseCategory;
use App\Http\Controllers\Controller;
use App\Repositories\CourseCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add(CourseCategoryRepository $repository)
    {
        $category = $repository->getDraft(\Auth::user());
        if (!$category) {
            $category = new CourseCategory();
            $category->status = 'draft';
            $category->title = '';
            $category->slug = '';
            $category->user_id = \Auth::user()->id;
            $repository->save($category);
        }
        return redirect()->route('admin.course.category.edit', ['category' => $category]);
    }

    public function edit(CourseCategory $category)
    {
        return view('admin.courses.categories.edit', [
            'category' => $category,
        ]);
    }

    public function store(CourseCategory $category, Request $request, CourseCategoryRepository $repository)
    {
        $fields = $request->get('edit');
        $category->fill($request->get('edit'));
        $category->status = !empty($fields['published']) ? 'published' : 'unpublished';
        $category->user_id = \Auth::user()->id;
        $repository->save($category);
        return redirect()->route('admin.courses.categories.list');
    }

    public function delete(CourseCategory $category, CourseCategoryRepository $repository)
    {
        $category->user_id = \Auth::user()->id;
        $repository->remove($category);

        return redirect()->route('admin.courses.categories.list');
    }
}
