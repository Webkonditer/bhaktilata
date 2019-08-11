<?php

namespace App\Http\Controllers\Admin;

use App\Documentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.documentations.index', [
          'documentations' => Documentation::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //dump($request->all()); active_url

      $result = array();
      $categories = Documentation::pluck('category');//Коллекция из столбца category
      foreach($categories as $value){$result[] = $value;}
      $result = array_unique($result);//Берем уникальные значения и столба категорий
      return view('admin.documentations.create', [
        'categories'  => $result,
      ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = $this->validate($request, [
          'document' => 'required',
          'title' => 'required|string|max:255',
          'description' => 'required|string|max:255',
          'category' => 'nullable|string|max:255',
          'new_category' => 'nullable|string|max:255',
      ]);
      //dump($request->all());
      if(is_string ($request->document)) {
        $path = $request->document;
      }
      else {
        $path = $request->file('document')->store('i\documentation', 'public');
      }
      //exit();

      if($request->has('new_category')) $category = $request->new_category;
      else $category = $request->category;

      Documentation::create([
        'title' => $request->title,
        'description' => $request->description,
        'link' => $path,
        'category' => $category,
      ]);

      return view('admin.documentations.index', [
        'documentations' => Documentation::orderBy('created_at', 'desc')->paginate(10)
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Documentation $documentation)
    {
      $result = array();
      $categories = Documentation::pluck('category');//Коллекция из столбца category
      foreach($categories as $value){$result[] = $value;}
      $result = array_unique($result);
      //print_r($result);//Берем уникальные значения и столба категорий
      return view('admin.documentations.edit', [
        'categories'  => $result,
        'documentation' => $documentation,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documentation $documentation)
    {
      $validator = $this->validate($request, [
          'document' => 'required',
          'title' => 'required|string|max:255',
          'description' => 'required|string|max:255',
          'category' => 'required|string|max:255',
          'new_category' => 'nullable|string|max:255',
      ]);

      if(is_string ($request->document)) {
        $path = $request->document;
      }
      else {
        $path = $request->file('document')->store('i\documentation', 'public');
        //$path = $request->file('document')->storeAs('i\documentation', $request->file('document')->getClientOriginalName() );
      }
      //$path = $request->file('avatar')->storeAs('avatars', $request->user()->id
      //dump($request->file('document')->originalName);
      //echo Str::slug($request->file('document')->getClientOriginalName());
      //exit();

      if($request->has('new_category')) $category = $request->new_category;
      else $category = $request->category;

        $documentation->title = $request->title;
        $documentation->description = $request->description;
        $documentation->link = $path;
        $documentation->category = $category;
        $documentation->save();

      return view('admin.documentations.index', [
        'documentations' => Documentation::orderBy('created_at', 'desc')->paginate(10)
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentation $documentation)
    {
        $documentation->delete();

        return redirect()->route('admin.documentation.index');
    }

    public function showPage()
    {
      $result = array();
      $categories = Documentation::pluck('category');//Коллекция из столбца category
      foreach($categories as $value){$result[] = $value;}
      $result = array_unique($result);

      $i = 1;
      //$profiles = array();
      //$profiles[1] = array();;
      foreach ($result as $category_list){
        $i++;
          if($category_list == 'Джи-Би-Си') {//Ставим джи би си в начало списка
            $profiles[1]['cat'] = $category_list;
            $profiles[1]['link'] = 'profile1';
            $profiles[1]['data'] = Documentation::where('category','=', $category_list)->get();
          }
          elseif($category_list == 'Другое') {//Ставим другое в конец списка
            $profiles[999]['cat'] = $category_list;
            $profiles[999]['link'] = 'profile999';
            $profiles[999]['data'] = Documentation::where('category','=', $category_list)->get();
          }
          else {
            $profiles[$i]['cat'] = $category_list;
            $profiles[$i]['link'] = 'profile'.$i;
            $profiles[$i]['data'] = Documentation::where('category','=', $category_list)->get();
          }
      };

      if(isset($profiles[2]) && !isset($profiles[1])) {//Если нет джи би си, ставим вперед вторую позицию
          $profiles[1] = $profiles[2];
          unset($profiles[2]);
      }
      if(isset($profiles[1])) {
        ksort($profiles);
      }
      else $profiles = array();

      //print_r($profiles); exit();

      return view('public.documentations.documentations', [
          'profiles' => $profiles,
      ]);

      //exit('Ты попал в правильное место!!!!!!!!!!!!!!S7777777777777');

    }

}
