<?php
/**
 * @var \App\Domain\Contacts\Contact $contact
 */
?>
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
                <form role="form" name="edit" action="{{ route('admin.news.store', ['newsItem' => $newsItem]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="published">
                                    <input type="checkbox"
                                           id="published"
                                           name="edit[published]"
                                           {{ $newsItem->isPublished() ? 'checked="checked"' : '' }}
                                    /> Отображается на сайте
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug">Код</label>
                            <input type="text"
                                   name="edit[slug]"
                                   class="form-control"
                                   id="slug"
                                   value="{{$newsItem->slug}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text"
                                   name="edit[title]"
                                   class="form-control"
                                   id="title"
                                   value="{{$newsItem->title}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="date">Дата публикации</label>
                            <input type="text"
                                   name="edit[date]"
                                   class="form-control datepicker-enabled"
                                   id="date"
                                   value="{{$newsItem->date ? $newsItem->date->format('d.m.Y') : ''}}"
                                   placeholder="Дата в формате дд.мм.ГГ"
                            />
                        </div>
                        <div class="form-group">
                            <label for="content">Содержимое</label>
                            <textarea id="content"
                                      name="edit[content]"
                                      rows="10"
                                      cols="80"
                                      class="js-editor-enabled">{{ $newsItem->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="small_image">Путь к картинке для списка</label>
                            <input type="text"
                                   name="edit[small_image]"
                                   class="form-control"
                                   id="small_image"
                                   value="{{$newsItem->small_image ? $newsItem->small_image : ''}}"
                                   placeholder="/images/some-image.png"
                            />
                        </div>
                        <div class="form-group">
                            <label for="medium_image">Путь к картинке для страницы новости</label>
                            <input type="text"
                                   name="edit[medium_image]"
                                   class="form-control"
                                   id="medium_image"
                                   value="{{$newsItem->medium_image ? $newsItem->medium_image : ''}}"
                                   placeholder="/images/some-image.png"
                            />
                        </div>
                        <div class="form-group">
                            <label for="full_image">Путь к оригинальному изображению</label>
                            <input type="text"
                                   name="edit[full_image]"
                                   class="form-control"
                                   id="full_image"
                                   value="{{$newsItem->full_image ? $newsItem->full_image : ''}}"
                                   placeholder="/images/some-image.png"
                            />
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