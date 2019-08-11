<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Courses\Course;
use App\Http\Controllers\Controller;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function add(CourseRepository $repository)
    {
        $course = $repository->getDraft(\Auth::user());
        if (!$course) {
            $course = new Course();
            $course->status = 'draft';
            $course->title = '';
            $course->slug = '';
            $course->user_id = \Auth::user()->id;
            $repository->save($course);
        }
        return redirect()->route('admin.course.edit', ['course' => $course]);
    }

    public function edit(Course $course, CourseCategoryRepository $repository)
    {
        return view('admin.courses.edit', [
            'categories' => $repository->all(),
            'course' => $course,
        ]);
    }

    public function store(Course $course, Request $request, CourseRepository $repository)
    {
        $fields = $request->get('edit');
        $course->fill($request->get('edit'));
        $course->status = !empty($fields['published']) ? 'published' : 'unpublished';
        $course->user_id = \Auth::user()->id;
        $repository->save($course);
        return redirect()->route('admin.courses.list');
    }

    public function delete(Course $course, CourseRepository $repository)
    {
        $course->user_id = \Auth::user()->id;
        $repository->remove($course);

        return redirect()->route('admin.courses.list');
    }
}
