<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Repositories\CourseEventRepository;
use Illuminate\Http\Request;

use App\Schedule\CourseList;
use App\Schedule\Schedule;

class ScheduleController extends Controller
{
    public function index(CourseEventRepository $eventRepository)
    {
      //dd($eventRepository->closest());
        return view('public.courses.schedule', [
            'events' => $eventRepository->closest(),
        ]);
    }

    public function show(Schedule $schedules)
    {
        return view('public.courses.course-schedule', [
            //'schedules' => $schedules->all(),
            'schedules' => $schedules->orderBy('beginning_date')->get(),
        ]);
    }

    public function get_page(Schedule $schedules, Request $request)
    {
      $courselist = CourseList::where('id', $request->cours)->first();
      //dd($courselist->schedules);
      //if ($courselist->count > 0) {
        return view('public.courses.schedule_page', [
            'courselist' => $courselist,
        ]);
    //  }
      //else echo "<H3>Нет доступных курсов.</H3>";
    }
}
