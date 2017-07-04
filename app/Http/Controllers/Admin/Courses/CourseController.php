<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Courses\Course;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function edit(Course $course, CourseRepository $repository)
    {
        return view('admin.courses.edit', [
            'course' => $course,
        ]);
    }

    public function store(Course $course, CourseRepository $repository, Request $request)
    {
        $data = $request->get('edit');
        $course->fill($data);
        $repository->save($course);
        return redirect(route('admin.course.edit', ['course' => $course]));
    }
}
