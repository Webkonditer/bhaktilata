<?php

namespace App\Http\Controllers\Projects;

use App\Projects\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;

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
        $courses = $this->repository->all();
        return view('public.courses.list', [
            'courses' => $courses
        ]);
    }

    public function category(ProjectCategory $category)
    {
        $courses = $this->repository->inCategory($category);
        return view('public.courses.list', [
            'courses' => $courses
        ]);
    }
}
