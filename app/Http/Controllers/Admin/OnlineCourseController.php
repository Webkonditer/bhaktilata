<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OnlineCourse;
use App\teacher;

class OnlineCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.onlineCourses.index', [
        'onlinecourses' => OnlineCourse::orderBy('created_at', 'desc')->paginate(10)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.onlineCourses.create', [
        'teachers' => teacher::orderBy('id', 'asc')->get()
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OnlineCourse $OnlineCourse)
    {
        //dd($request);
        $validator = $this->validate($request, [
          'top_image' => 'required|active_url',
          'title' => 'required|string|max:255',
          'side_picture' => 'required|image',
          'description' => 'required|string|max:2000',
          'benefits_list' => 'required|string|max:255',
          'topics.*' => 'required|string|max:2',
          'date_start' => 'required|string|max:255',
          'audience.*' => 'required|string|max:2',
          'special_requirements' => 'required|string|max:255',
          'duration' => 'required|string|max:255',
          'format' => 'required|string|max:255',
          'teacher.*' => 'required|string|max:2',
          'registration_link' => 'required|active_url',
        ]);
        $topics = '';
        $OnlineCourse->top_image = $request->top_image;
        $OnlineCourse->title = $request->title;
        $OnlineCourse->side_picture = $request->file('side_picture')->store('i/OnlineCourse', 'public');
        $OnlineCourse->description = $request->description;
        $OnlineCourse->benefits_list = $request->benefits_list;
        $OnlineCourse->topics = implode('|', array_keys($request->topics));
        $OnlineCourse->date_start = $request->date_start;
        $OnlineCourse->audience = implode('|', array_keys($request->audience));
        $OnlineCourse->special_requirements = $request->special_requirements;
        $OnlineCourse->duration = $request->duration;
        $OnlineCourse->format = $request->format;
        $OnlineCourse->teacher = implode('|', array_keys($request->teacher));
        $OnlineCourse->registration_link = $request->registration_link;
        $OnlineCourse->save();

        return redirect()->route('admin.onlinecourses.index');
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
    public function edit(OnlineCourse $onlinecourse)
    {

      return view('admin.onlineCourses.edit', [
        'onlinecourse' => $onlinecourse,
        'teachers' => teacher::orderBy('id', 'asc')->get(),
        'topics' => explode("|", $onlinecourse->topics),
        'audiences' => explode("|", $onlinecourse->audience),
        'ch_teachers' => explode("|", $onlinecourse->teacher),
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlineCourse $onlinecourse)
    {
      $validator = $this->validate($request, [
        'top_image' => 'required|active_url',
        'title' => 'required|string|max:255',
        'side_picture' => 'nullable|image',
        'description' => 'required|string|max:2000',
        'benefits_list' => 'required|string|max:255',
        'topics.*' => 'required|string|max:2',
        'date_start' => 'required|string|max:255',
        'audience.*' => 'required|string|max:2',
        'special_requirements' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'format' => 'required|string|max:255',
        'teacher.*' => 'required|string|max:2',
        'registration_link' => 'required|active_url',
      ]);

      $onlinecourse->top_image = $request->top_image;
      $onlinecourse->title = $request->title;
      if(isset($request->side_picture))$onlinecourse->side_picture = $request->file('side_picture')->store('i/OnlineCourse', 'public');
      $onlinecourse->description = $request->description;
      $onlinecourse->benefits_list = $request->benefits_list;
      $onlinecourse->topics = implode('|', array_keys($request->topics));
      $onlinecourse->date_start = $request->date_start;
      $onlinecourse->audience = implode('|', array_keys($request->audience));
      $onlinecourse->special_requirements = $request->special_requirements;
      $onlinecourse->duration = $request->duration;
      $onlinecourse->format = $request->format;
      $onlinecourse->teacher = implode('|', array_keys($request->teacher));
      $onlinecourse->registration_link = $request->registration_link;
      $onlinecourse->save();

      return redirect()->route('admin.onlinecourses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlineCourse $onlinecourse)
    {
      $onlinecourse->delete();

      return redirect()->route('admin.onlinecourses.index');
    }
}
