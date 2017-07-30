@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
            {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Quick Example</h3>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
            <!-- form start -->
                <form role="form" name="edit" action="{{ route('admin.course.store', ['course' => $course]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="published">
                                    <input type="checkbox"
                                           id="published"
                                           name="edit[published]"
                                           {{$course->isPublished() ? 'checked' : '' }}
                                    /> Отображается на сайте
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text"
                                   name="edit[title]"
                                   class="form-control"
                                   id="title"
                                   value="{{$course->title}}"
                                   placeholder="Введите название"
                            />
                        </div>
                        <div class="form-group">
                            <label for="slug">Код</label>
                            <input type="text"
                                   name="edit[slug]"
                                   class="form-control"
                                   id="slug"
                                   value="{{$course->slug}}"
                                   placeholder="Enter email"
                            />
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="edit[category_id]" id="category_id" class="form-control">
                                <option value="">Не выбрана</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $course->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                @endforeach;
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="announce">Анонс</label>
                            <textarea id="announce"
                                      name="edit[announce]"
                                      rows="10"
                                      cols="80"
                                      class="js-editor-enabled">{{ $course->announce }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Полное описание</label>
                            <textarea id="description"
                                      name="edit[description]"
                                      rows="10"
                                      cols="80"
                                      class="js-editor-enabled">{{ $course->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="meta_title">Мета: Заголовок</label>
                            <input type="text"
                                   name="edit[meta_title]"
                                   class="form-control"
                                   id="meta_title"
                                   value="{{ $course->meta_title }}"
                                   placeholder="Введите meta title"
                            />
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Мета: Описание</label>
                            <input type="text"
                                   name="edit[meta_description]"
                                   class="form-control"
                                   id="meta_description"
                                   value="{{ $course->meta_description }}"
                                   placeholder="Введите meta description"
                            />
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Мета: Ключевые слова</label>
                            <input type="text"
                                   name="edit[meta_keywords]"
                                   class="form-control"
                                   id="meta_keywords"
                                   value="{{ $course->meta_keywords }}"
                                   placeholder="Введите meta keywords"
                            />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="edit[submit]" value="1" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection