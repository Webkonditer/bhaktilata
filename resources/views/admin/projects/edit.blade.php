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
                <form role="form" name="edit" action="{{ route('admin.project.store', ['project' => $project]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="published">
                                    <input type="checkbox"
                                           id="published"
                                           name="edit[published]"
                                           {{$project->isPublished() ? 'checked' : '' }}
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
                                   value="{{$project->title}}"
                                   placeholder="Введите название"
                            />
                        </div>
                        <div class="form-group">
                            <label for="slug">Код</label>
                            <input type="text"
                                   name="edit[slug]"
                                   class="form-control"
                                   id="slug"
                                   value="{{$project->slug}}"
                                   placeholder="Enter email"
                            />
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="edit[category_id]" id="category_id" class="form-control">
                                <option value="">Не выбрана</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $project->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                @endforeach;
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="announce">Анонс</label>
                            <textarea id="announce"
                                      name="edit[announce]"
                                      rows="10"
                                      cols="80"
                                      class="js-editor-enabled">{{ $project->announce }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Полное описание</label>
                            <textarea id="description"
                                      name="edit[description]"
                                      rows="10"
                                      cols="80"
                                      class="js-editor-enabled">{{ $project->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="link">Ссылка на сайт проекта</label>
                            <input type="text"
                                   name="edit[link]"
                                   class="form-control"
                                   id="link"
                                   value="{{$project->link}}"
                                   placeholder="Введите адрес ссылки"
                            />
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label for="is_opened">
                                    <input type="checkbox"
                                           id="is_opened"
                                           name="edit[is_opened]"
                                           value="1"
                                            {{$project->is_opened ? 'checked' : '' }}
                                    /> Открыта запись на проект
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title">Мета: Заголовок</label>
                            <input type="text"
                                   name="edit[meta_title]"
                                   class="form-control"
                                   id="meta_title"
                                   value="{{ $project->meta_title }}"
                                   placeholder="Введите meta title"
                            />
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Мета: Описание</label>
                            <input type="text"
                                   name="edit[meta_description]"
                                   class="form-control"
                                   id="meta_description"
                                   value="{{ $project->meta_description }}"
                                   placeholder="Введите meta description"
                            />
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Мета: Ключевые слова</label>
                            <input type="text"
                                   name="edit[meta_keywords]"
                                   class="form-control"
                                   id="meta_keywords"
                                   value="{{ $project->meta_keywords }}"
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