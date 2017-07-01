<?php

namespace App\Http\Controllers\Courses;

use App\Courses\Course;
use App\Courses\CourseCategory;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;

class CourseController extends Controller
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


    public function course(CourseCategory $category, Course $course)
    {
        dd($course->category);
        return view('public.courses.course', [
            'category' => $category,
            'course' => $course,
        ]);
    }
}
