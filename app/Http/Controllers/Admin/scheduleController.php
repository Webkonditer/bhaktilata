<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule\CourseList;
use App\Schedule\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class scheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseList $courselist)
    {
      return view('admin.schedule.index', [
        'schedules' => Schedule::orderBy('created_at', 'desc')->paginate(10),
        'courselist'  => $courselist->all(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CourseList $courselist)
    {
      //$schedule = Schedule::find(2);
      //dump($schedule->courselist);

      //$courselist = CourseList::find(1);
      //dump($courselist->schedules);

      return view('admin.schedule.create', [
        'courselist'  => $courselist,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Schedule $schedule)
    {

      //dd($request->all());
      $validator = $this->validate($request, [

          'course_id' => 'required|integer',
          'city' => 'required|string|max:191',
          'place' => 'required|string|max:191',
          'beginning_date' => 'required|date',
          'expiration_date' => 'required|date',
          'is_opened' => 'string|max:2',
          'cost' => 'required|string|max:191',
          'accommodation' => 'required|string|max:191',
          'format' => 'required|string|max:191',
          'homework' => 'required|string|max:191',
          'requirements_for_students' => 'required|string|max:191',
          'contacts.name' => 'required|string|max:191',
          'contacts.phone' => 'required|string|max:191',
          'contacts.mail' => 'required|email',
          'teacher.name' => 'required|string|max:191',
          'teacher.position' => 'required|string|max:191',
          'teacher_foto' => 'required|image',
          'course_link' => 'required|active_url',
          'description' => 'required|string|max:500',
          'map_code' => 'nullable|string|max:500',
          'reg_link' => 'required|active_url',
      ]);
      //dd($request->all());
        $path = $request->file('teacher_foto')->store('i/schedulePhoto', 'public');

        $schedule->course_id = $request->course_id;
        $schedule->city = $request->city;
        $schedule->place = $request->place;
        $schedule->beginning_date = date ('Y-m-d', strtotime ($request->beginning_date));
        $schedule->expiration_date = date ('Y-m-d', strtotime ($request->expiration_date));
        if($request->is_opened)$schedule->is_opened = true; else $schedule->is_opened = false;
        $schedule->cost = $request->cost;
        $schedule->accommodation = $request->accommodation;
        $schedule->format = $request->format;
        $schedule->homework = $request->homework;
        $schedule->requirements_for_students = $request->requirements_for_students;
        $schedule->contacts = json_encode($request->contacts);
        $schedule->teacher = json_encode($request->teacher);
        $schedule->teacher_foto = $path;
        $schedule->course_link = $request->course_link;
        $schedule->description = $request->description;
        if($request->map_code)$schedule->map_code = $request->map_code; else $schedule->map_code = '';
        $schedule->reg_link = $request->reg_link;
        $schedule->save();

        return redirect()->route('admin.schedule.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {

      //dump(CourseList::all());
      //dd($schedule);
      return view('admin.schedule.edit', [
        'courselist'  => Courselist::all(),
        'schedule' => $schedule,
      ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //dd($request->all());
        $validator = $this->validate($request, [

            'course_id' => 'required|integer',
            'city' => 'required|string|max:191',
            'place' => 'required|string|max:191',
            'beginning_date' => 'nullable|date',
            'expiration_date' => 'nullable|date',
            'is_opened' => 'string|max:2',
            'cost' => 'required|string|max:191',
            'accommodation' => 'required|string|max:191',
            'format' => 'required|string|max:191',
            'homework' => 'required|string|max:191',
            'requirements_for_students' => 'required|string|max:191',
            'contacts.name' => 'required|string|max:191',
            'contacts.phone' => 'required|string|max:191',
            'contacts.mail' => 'required|email',
            'teacher.name' => 'required|string|max:191',
            'teacher.position' => 'required|string|max:191',
            'teacher_foto' => 'nullable|image',
            'course_link' => 'required|active_url',
            'description' => 'required|string|max:500',
            'map_code' => 'nullable|string|max:500',
            'reg_link' => 'required|active_url',
        ]);
        //dump($request->all());
          if(null !==($request->file('teacher_foto'))) $path = $request->file('teacher_foto')->store('i/schedulePhoto', 'public');
          else $path = null;
          $schedule->course_id = $request->course_id;
          $schedule->city = $request->city;
          $schedule->place = $request->place;
          if($request->beginning_date)$schedule->beginning_date = date ('Y-m-d', strtotime ($request->beginning_date));
          if($request->expiration_date)$schedule->expiration_date = date ('Y-m-d', strtotime ($request->expiration_date));
          if($request->is_opened)$schedule->is_opened = true; else $schedule->is_opened = false;
          $schedule->cost = $request->cost;
          $schedule->accommodation = $request->accommodation;
          $schedule->format = $request->format;
          $schedule->homework = $request->homework;
          $schedule->requirements_for_students = $request->requirements_for_students;
          $schedule->contacts = json_encode($request->contacts);
          $schedule->teacher = json_encode($request->teacher);
          if($path)$schedule->teacher_foto = $path;
          $schedule->course_link = $request->course_link;
          $schedule->description = $request->description;
          if($request->map_code)$schedule->map_code = $request->map_code; else $schedule->map_code = '';
          $schedule->reg_link = $request->reg_link;
          $schedule->save();

          return redirect()->route('admin.schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedule.index');
    }
}
