<?php

namespace App\Http\Controllers\Projects;

use App\Projects\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Collection;

class ListController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * ListController constructor.
     *
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $projects = $this->repository->all();
        return view('public.projects.list', [
            'projects' => $projects
        ]);
    }

    /**
     * @param Collection|ProjectCategory[] $categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Collection $categories)
    {
        $projects = $this->repository->inCategory($categories->last());
        /** @var Builder $c */
        /** @noinspection PhpUndefinedClassInspection */
        $c = \Menu::get('crumbs');
        foreach ($categories->slice(1, $categories->count()) as $category) {
            $c->add($category->title, 'aaa');
        }
        return view('public.projects.list', [
            'projects' => $projects,
            'category' => $categories->last(),
        ]);
    }
}
