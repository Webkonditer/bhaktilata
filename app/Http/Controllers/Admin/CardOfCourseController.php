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
  public function store(Request $request, CardOfCourse $CardOfCourse)
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
      $CardOfCourse->top_image = $request->top_image;
      $CardOfCourse->title = $request->title;
      $CardOfCourse->side_picture = $request->file('side_picture')->store('i/CardOfCourse', 'public');
      $CardOfCourse->description = $request->description;
      $CardOfCourse->benefits_list = $request->benefits_list;
      $CardOfCourse->topics = implode('|', array_keys($request->topics));
      $CardOfCourse->date_start = $request->date_start;
      $CardOfCourse->audience = implode('|', array_keys($request->audience));
      $CardOfCourse->special_requirements = $request->special_requirements;
      $CardOfCourse->duration = $request->duration;
      $CardOfCourse->format = $request->format;
      $CardOfCourse->teacher = implode('|', array_keys($request->teacher));
      $CardOfCourse->registration_link = $request->registration_link;
      $CardOfCourse->save();

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
  public function edit(CardOfCourse $CardOfCourse)
  {

    return view('admin.CardOfCourse.edit', [
      'cardofcourses' => $CardOfCourse,
      'teachers' => teacher::orderBy('id', 'asc')->get(),
      'topics' => explode("|", $CardOfCourse->topics),
      'audiences' => explode("|", $CardOfCourse->audience),
      'ch_teachers' => explode("|", $CardOfCourse->teacher),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, CardOfCourse $CardOfCourse)
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

    $CardOfCourse->top_image = $request->top_image;
    $CardOfCourse->title = $request->title;
    if(isset($request->side_picture))$CardOfCourse->side_picture = $request->file('side_picture')->store('i/CardOfCourse', 'public');
    $CardOfCourse->description = $request->description;
    $CardOfCourse->benefits_list = $request->benefits_list;
    $CardOfCourse->topics = implode('|', array_keys($request->topics));
    $CardOfCourse->date_start = $request->date_start;
    $CardOfCourse->audience = implode('|', array_keys($request->audience));
    $CardOfCourse->special_requirements = $request->special_requirements;
    $CardOfCourse->duration = $request->duration;
    $CardOfCourse->format = $request->format;
    $CardOfCourse->teacher = implode('|', array_keys($request->teacher));
    $CardOfCourse->registration_link = $request->registration_link;
    $CardOfCourse->save();

    return redirect()->route('admin.cardofcourses.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(CardOfCourse $CardOfCourse)
  {
    $CardOfCourse->delete();

    return redirect()->route('admin.cardofcourses.index');
  }
}
