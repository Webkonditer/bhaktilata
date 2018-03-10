<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Repositories\CourseEventRepository;

class ScheduleController extends Controller
{
    public function index(CourseEventRepository $eventRepository)
    {
        return view('public.courses.schedule', [
            'events' => $eventRepository->closest(),
        ]);
    }
}