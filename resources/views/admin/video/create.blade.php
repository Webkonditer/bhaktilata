<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Новое видео или вебинар</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Загрузка нового видео или вебинара</h2>
                <form role="form" name="edit" action="{{ route('admin.video.store')}}" method="POST">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>

                    </div>

                  @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                      <div class="form-group">
                          <label for="title">Укажите адрес видео</label>
                          <input type="text"
                                 name="video_uri"
                                 class="form-control"
                                 value="{{old('video_uri')}}"
                                 placeholder="Ссылка типа embed: https://www.youtube.com/embed/example_video"
                          />
                      </div>

                        <div class="form-group">
                            <label for="title">Выберите категорию</label>
                            <select class="form-control" name="category">
                              @foreach ($categories as $category_list)
                                <option value="{{$category_list}}">
                                  {{$category_list}}
                                </option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">или создайте новую категорию</label>
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
                                   value="{{old('title')}}"
                                   placeholder="Введите название"
                            />
                        </div>

                        <div class="form-group">
                            <label for="title">Автор</label>
                            <input type="text"
                                   name="autor"
                                   class="form-control"
                                   id="title"
                                   value="{{old('autor')}}"
                                   placeholder="Имя автора"
                            />
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input  type="text"
                                    id="description"
                                    name="description"
                                    class="form-control"
                                    value="{{old('description')}}"
                                    placeholder="Описание видео или вебинара"
                            />
                        </div>

                        <div class="form-group">
                            <label for="title">Ссылка на сайт</label>
                            <input type="text"
                                   name="site_link"
                                   class="form-control"
                                   id="title"
                                   value="{{old('site_link')}}"
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
