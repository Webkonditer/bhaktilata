<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Projects\ProjectCategory;
use App\Repositories\ProjectCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add(ProjectCategoryRepository $repository)
    {
        $category = $repository->getDraft(\Auth::user());
        if (!$category) {
            $category = new ProjectCategory();
            $category->status = 'draft';
            $category->title = '';
            $category->slug = '';
            $category->user_id = \Auth::user()->id;
            $repository->save($category);
        }
        return redirect()->route('admin.project.category.edit', ['category' => $category]);
    }

    public function edit(ProjectCategory $category, ProjectCategoryRepository $repository)
    {
        return view('admin.projects.categories.edit', [
            'category' => $category,
            'categories' => $repository->all(),
        ]);
    }

    public function store(ProjectCategory $category, Request $request, ProjectCategoryRepository $repository)
    {
        $fields = $request->get('edit');
        $category->fill($request->get('edit'));
        $category->status = !empty($fields['published']) ? 'published' : 'unpublished';
        $category->user_id = \Auth::user()->id;
        $repository->save($category);
        return redirect()->route('admin.projects.categories.list');
    }

    public function delete(ProjectCategory $category, ProjectCategoryRepository $repository)
    {
        $category->user_id = \Auth::user()->id;
        $repository->remove($category);

        return redirect()->route('admin.projects.categories.list');
    }
}
