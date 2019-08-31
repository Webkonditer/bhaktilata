<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CardOfCourse;
use App\teacher;

class CardOfCourseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.CardOfCourse.index', [
      'cardofcourses' => CardOfCourse::orderBy('created_at', 'desc')->paginate(10)
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.CardOfCourse.create', [
      'teachers' => teacher::orderBy('id', 'asc')->get()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, CardOfCourse $cardofcourse)
  {
      //dd($request);
      $validator = $this->validate($request, [
        'picture' => 'required|image',
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'topics.*' => 'required|string|max:2',
        'date_start' => 'required|string|max:255',
        'audience.*' => 'required|string|max:2',
        'duration.*' => 'required|string|max:2',
        'format.*' => 'required|string|max:2',
        'teacher.*' => 'required|string|max:2',
        'course_link' => 'required|active_url',
      ]);

      $cardofcourse->picture = $request->file('picture')->store('i/CardOfCourse', 'public');
      $cardofcourse->title = $request->title;
      $cardofcourse->description = $request->description;
      $cardofcourse->topics = implode('|', array_keys($request->topics));
      $cardofcourse->date_start = $request->date_start;
      $cardofcourse->audience = implode('|', array_keys($request->audience));
      $cardofcourse->duration = implode('|', array_keys($request->duration));
      $cardofcourse->format = implode('|', array_keys($request->format));
      $cardofcourse->teacher = implode('|', array_keys($request->teacher));
      $cardofcourse->course_link = $request->course_link;
      $cardofcourse->save();

      return redirect()->route('admin.cardofcourses.index');
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
  public function edit(CardOfCourse $cardofcourse)
  {

    return view('admin.CardOfCourse.edit', [
      'cardofcourse' => $cardofcourse,
      'teachers' => teacher::orderBy('id', 'asc')->get(),
      'topics' => explode("|", $cardofcourse->topics),
      'audiences' => explode("|", $cardofcourse->audience),
      'ch_teachers' => explode("|", $cardofcourse->teacher),
      'durations' => explode("|", $cardofcourse->duration),
      'formats' => explode("|", $cardofcourse->format),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, CardOfCourse $cardofcourse)
  {

    $validator = $this->validate($request, [
      'picture' => 'nullable|image',
      'title' => 'required|string|max:255',
      'description' => 'required|string|max:2000',
      'topics.*' => 'required|string|max:2',
      'date_start' => 'required|string|max:255',
      'audience.*' => 'required|string|max:2',
      'duration.*' => 'required|string|max:2',
      'format.*' => 'required|string|max:2',
      'teacher.*' => 'required|string|max:2',
      'course_link' => 'required|active_url',
    ]);

    if(isset($request->picture))$cardofcourse->picture = $request->file('picture')->store('i/CardOfCourse', 'public');
    $cardofcourse->title = $request->title;
    $cardofcourse->description = $request->description;
    $cardofcourse->topics = implode('|', array_keys($request->topics));
    $cardofcourse->date_start = $request->date_start;
    $cardofcourse->audience = implode('|', array_keys($request->audience));
    $cardofcourse->duration = implode('|', array_keys($request->duration));
    $cardofcourse->format = implode('|', array_keys($request->format));
    $cardofcourse->teacher = implode('|', array_keys($request->teacher));
    $cardofcourse->course_link = $request->course_link;
    $cardofcourse->save();

    return redirect()->route('admin.cardofcourses.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(CardOfCourse $cardofcourse)
  {
    $cardofcourse->delete();

    return redirect()->route('admin.cardofcourses.index');
  }
}
