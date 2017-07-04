<?php

namespace App\Http\Controllers\Courses;

use App\Courses\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;

class ListController extends Controller
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
