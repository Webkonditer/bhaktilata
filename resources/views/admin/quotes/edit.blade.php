<?php
/**
 * @var \App\Domain\QuoteOfTheDay\Quote $quote
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
                <form role="form" name="edit" action="{{ route('admin.quote.store', ['quote' => $quote]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <label for="published">
                                    <input type="checkbox"
                                           id="published"
                                           name="edit[published]"
                                           {{ $quote->isPublished() ? 'checked="checked"' : '' }}
                                    /> Отображается на сайте
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="day">День публикации</label>
                            <input type="text"
                                   name="edit[day]"
                                   class="form-control datepicker-enabled"
                                   id="day"
                                   value="{{$quote->day ? $quote->day->format('d.m.Y') : ''}}"
                                   placeholder="Дата в формате дд.мм.ГГ"
                            />
                        </div>
                        <div class="form-group">
                            <label for="date">Дата цитаты</label>
                            <input type="text"
                                   name="edit[date]"
                                   class="form-control datepicker-enabled"
                                   id="date"
                                   value="{{$quote->date ? $quote->date->format('d.m.Y') : ''}}"
                                   placeholder="Дата в формате дд.мм.ГГ"
                            />
                        </div>
                        <div class="form-group">
                            <label for="location">Адрес</label>
                            <input type="text"
                                   name="edit[location]"
                                   class="form-control"
                                   id="location"
                                   value="{{$quote->location}}"
                                   placeholder="Местоположение цитаты"
                            />
                        </div>
                        <div class="form-group">
                            <label for="author">Подпись</label>
                            <input type="text"
                                   name="edit[author]"
                                   class="form-control"
                                   id="author"
                                   value="{{$quote->author}}"
                                   placeholder="Подпись"
                            />
                        </div>
                        <div class="form-group">
                            <label for="text">Текст</label>
                            <div>
                                <textarea id="text"
                                          name="edit[text]"
                                          rows="10"
                                          cols="80">{{ $quote->text }}</textarea>
                            </div>
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