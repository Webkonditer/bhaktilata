<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\teacher;

class TeachersController extends Controller
{
    //Контроллер по управлению данными преподавателей
    public function index()
    {
      return view('admin.teachers.index', [
        'teachers' => teacher::orderBy('id', 'asc')->get()
      ]);
    }

    public function create()
    {
      return view('admin.teachers.create');
    }

    public function store(Request $request, teacher $teacher)
    {
      $validator = $this->validate($request, [
          'foto' => 'required|image',
          'name' => 'required|string|max:255',
          'description' => 'nullable|string|max:2000',
      ]);

      $path = $request->file('foto')->store('i/TeachersPhoto', 'public');

      $teacher->name = $request->name;
      $teacher->foto = $path;
      $teacher->description = $request->description;
      $teacher->save();

      return redirect()->route('admin.teachers.index');
    }


    public function edit(teacher $teacher)
    {
      return view('admin.teachers.edit', [
        'teacher' => $teacher,
      ]);
    }

    public function update(Request $request, teacher $teacher)
    {//dd($teacher);
      $validator = $this->validate($request, [
          'foto' => 'nullable|image',
          'name' => 'required|string|max:255',
          'description' => 'nullable|string|max:2000',
      ]);

      if(null !==($request->file('foto'))) $path = $request->file('foto')->store('i/TeachersPhoto', 'public');

      if(isset($path))$teacher->foto = $path;
      $teacher->name = $request->name;
      $teacher->description = $request->description;
      $teacher->save();

      return redirect()->route('admin.teachers.index');

    }

    public function destroy(teacher $teacher)
    {
      $teacher->delete();

      return redirect()->route('admin.teachers.index');
    }

    public function show($id)
    {
        //
    }

    //---------------
}
