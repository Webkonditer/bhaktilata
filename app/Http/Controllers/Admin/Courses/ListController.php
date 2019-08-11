<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;

class ListController extends Controller
{
    public function index(CourseRepository $repository)
    {
        $courses = $repository->all();

        return view('admin.courses.list', [
            'courses' => $courses,
        ]);
    }
}
