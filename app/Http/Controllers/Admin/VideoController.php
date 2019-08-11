<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 1111111111111133333333
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.video.index', [
        'videos' => Video::orderBy('created_at', 'desc')->paginate(10)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $result = array();
      $categories = Video::pluck('category');//Коллекция из столбца category
      foreach($categories as $value){$result[] = $value;}
      $result = array_unique($result);//Берем уникальные значения и столба категорий
      return view('admin.video.create', [
        'categories'  => $result,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Video $video)
    {
      //dump($request->all()); exit();

      $validator = $this->validate($request, [
          'video_uri' => 'required|url|max:255',
          'category' => 'required_without:new_category|string|max:255',
          'new_category' => 'required_without:category|nullable|string|max:255',
          'title' => 'required|string|max:255',
          'autor' => 'required|string|max:255',
          'description' => 'nullable|string|max:255',
          'site_link' => 'nullable|url|max:255',
      ]);


      if($request->has('new_category')) $category = $request->new_category;
      else $category = $request->category;

      $video->category = $category;
      $video->video_uri = $request->video_uri;
      $video->title = $request->title;
      $video->autor = $request->autor;
      if($request->description != NULL)$video->description = $request->description;
      else $video->description = "";
      if($request->site_link != NULL)$video->site_link = $request->site_link;
      else $video->site_link = "";
      $video->save();

      return redirect()->route('admin.video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
      $result = array();
      $categories = Video::pluck('category');//Коллекция из столбца category
      foreach($categories as $value){$result[] = $value;}
      $result = array_unique($result);//Берем уникальные значения и столба категорий

      return view('admin.video.edit', [
        'categories'  => $result,
        'video' => $video,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
      $validator = $this->validate($request, [
          'video_uri' => 'required|url|max:255',
          'category' => 'required_without:new_category|string|max:255',
          'new_category' => 'required_without:category|nullable|string|max:255',
          'title' => 'required|string|max:255',
          'autor' => 'required|string|max:255',
          'description' => 'nullable|string|max:255',
          'site_link' => 'nullable|url|max:255',
      ]);

      if($request->has('new_category')) $category = $request->new_category;
      else $category = $request->category;

      $video->category = $category;
      $video->video_uri = $request->video_uri;
      $video->title = $request->title;
      $video->autor = $request->autor;
      if($request->description != NULL)$video->description = $request->description;
      else $video->description = "";
      if($request->site_link != NULL)$video->site_link = $request->site_link;
      else $video->site_link = "";
      $video->save();

      return redirect()->route('admin.video.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
      $video->delete();

      return redirect()->route('admin.video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function showPage()
    {
      $result = array();
      $categories = Video::pluck('category');//Коллекция из столбца category
      foreach($categories as $value){$result[] = $value;}
      $result = array_unique($result);

      $i = 0;
      foreach ($result as $category_list){
        $i++;
            $profiles[$i]['cat'] = $category_list;
            $profiles[$i]['link'] = 'profile'.$i;
            $profiles[$i]['data'] = Video::where('category','=', $category_list)->get();
      };

      if(isset($profiles[1])) {
        ksort($profiles);
      }
      else $profiles = array();

      //dump($profiles); exit();

      return view('public.videos.videos', [
          'profiles' => $profiles,
      ]);

      //exit('Ты попал в правильное место!!!!!!!!!!!!!!S7777777777777');

    }
}
