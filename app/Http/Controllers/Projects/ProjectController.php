<?php

namespace App\Http\Controllers\Courses;

use App\Courses\Course;
use App\Courses\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use Lavary\Menu\Menu;

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


    public function course(ProjectCategory $category, Course $course)
    {
        app()->make('menu')->get('crumbs')->add($course->title, ['route' => ['courses.course', 'course_category_slug' => $category->slug, 'course_slug' => $course->slug]]);
        return view('public.courses.course', [
            'category' => $category,
            'course' => $course,
        ]);
    }
}
