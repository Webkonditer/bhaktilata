


<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Редактирование видео или вебинара</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Редактирование данных видео или вебинара</h2>
                <form role="form" name="edit" action="{{ route('admin.video.update', $video)}}" method="POST">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                      <div class="form-group">
                          <label for="title">Укажите новый адрес видео в Интернете</label>
                          <input type="text"
                                 name="video_uri"
                                 class="form-control"
                                 value="@if(old('video_uri')){{old('video_uri')}} @else{{$video->video_uri}} @endif"
                                 placeholder="Ссылка типа embed: https://www.youtube.com/embed/example_video"
                          />
                      </div>

                        <div class="form-group">
                            <label for="title">Категория</label>
                            <select class="form-control" name="category">
                              @foreach ($categories as $category_list)
                                <option value="{{$category_list}}"
                                @if ($category_list == old('new_category'))
                                  selected = "selected"
                                @elseif ($category_list == $video->category)
                                  selected = "selected"
                                @endif
                                >
                                  {{$category_list}}
                                </option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Новая категория</label>
                            <input type="text"
                                   name="new_category"
                                   class="form-control"
                                   value="{{old('new_category')}}"
                                   placeholder="Введите название новой категории"
                            />
                        </div>

                        <div class="form-group">
                            <label for="title">Название видео или вебинара</label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   id="title"
                                   value="@if(old('title')){{old('title')}} @else{{$video->title}} @endif"
                                   placeholder="Введите название"
                            />
                        </div>

                        <div class="form-group">
                            <label for="title">Автор</label>
                            <input type="text"
                                   name="autor"
                                   class="form-control"
                                   id="title"
                                   value="@if(old('autor')){{old('autor')}} @else{{$video->autor}} @endif"
                                   placeholder="Имя автора"
                            />
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input  type="text"
                                    id="description"
                                    name="description"
                                    class="form-control"
                                    value="@if(old('description')){{old('description')}} @else{{$video->description}} @endif"
                                    placeholder="Описание видео или вебинара"
                            />
                        </div>

                        <div class="form-group">
                            <label for="title">Ссылка на сайт</label>
                            <input type="text"
                                   name="site_link"
                                   class="form-control"
                                   id="title"
                                   value="@if(old('site_link')){{old('site_link')}} @else{{$video->site_link}} @endif"
                                   placeholder="http://example.site"
                            />
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" value="1" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
