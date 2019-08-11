<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Projects\Project;
use App\Projects\ProjectCategory;
use App\Repositories\CourseRepository;

class ProjectController extends Controller
{
    /**
     * @var CourseRepository
     */
    private $repository;

    /**
     * ListController constructor.
     *
     * @param CourseRepository $repository
     */
    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }


    public function project($categoriesPath, Project $project)
    {
        $first = true;
        foreach ($categoriesPath as $category) {
            if ($first) {
                $first = false;
                continue;
            }
            app()->make('menu')->get('crumbs')->add($category->title, ['route' => [
                'projects.category',
                'project_category_slug' => $category->slugPath(),
            ]]);
        }
        app()->make('menu')->get('crumbs')->add($project->title, ['route' => [
            'projects.project',
            'project_category_slug' => $category->slugPath(),
            'project_slug' => $project->slug
        ]]);
        return view('public.projects.project', [
            'category' => $category,
            'project' => $project,
        ]);
    }
}
