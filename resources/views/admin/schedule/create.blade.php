<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Новое расписание</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Создание нового расписания</h2>
                {{-----------------------------}}

                <form role="form" name="edit" action="{{ route('admin.schedule.store')}}" method="POST" enctype="multipart/form-data">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <input name="_token" value="{{ csrf_token() }}" type="hidden">

                  <div class="box-body">
                    {{--
                    <div class="form-group">
                      <div class="checkbox">
                          <label for="published">
                              <input id="published" name="published" type="checkbox"> Отображается на сайте
                          </label>
                      </div>
                    </div>
                    --}}


                    <div class="form-group">
                        <label for="course">Выберите курс</label>
                        <select class="form-control" name="course_id">
                          @foreach ($courselist->all() as $course)
                            <option value="{{$course->id}}"
                            @if ($course->id == old('course_id'))
                              selected = "selected"
                            @endif
                            >
                              {{$course->course}}
                            </option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="city">Город</label>
                      <input name="city" class="form-control" id="city"
                        value="{{old('city')}}"
                        placeholder="Vrindavan"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="title">Место</label>
                      <input name="place" class="form-control" id="place"
                        value="{{old('place')}}"
                        placeholder="Адрес"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="beginning_date">Дата начала</label>
                      <input name="beginning_date" class="form-control datepicker-enabled"
                      id="date_start" value="" placeholder="Дата в формате дд.мм.ГГ"
                      type="text" value="{{old('beginning_date')}}">
                    </div>

                    <div class="form-group">
                      <label for="expiration_date">Дата окончания</label>
                      <input name="expiration_date" class="form-control datepicker-enabled"
                      id="date_end" value="" placeholder="Дата в формате дд.мм.ГГ"
                      type="text" value="{{old('expiration_date')}}">
                    </div>
                    {{--
                    <div class="form-group">
                      <div class="checkbox">
                          <label for="dates_confirmed">
                              <input id="dates_confirmed" name="edit[dates_confirmed]" type="checkbox"> Даты подтверждены
                          </label>
                      </div>
                    </div>
                    --}}
                    <div class="form-group">
                      <div class="checkbox">
                          <label for="is_opened">
                              <input id="is_opened" name="is_opened" type="checkbox"> Запись открыта
                          </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="cost">Стоимость</label>
                        <input name="cost" class="form-control" id="cost "
                        value="{{old('cost')}}"
                        placeholder="Стоимость курса"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="accommodation">Проживание</label>
                        <input name="accommodation" class="form-control" id="accommodation "
                        value="{{old('accommodation')}}"
                        placeholder="Проживание"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="format">Формат</label>
                        <input name="format" class="form-control" id="format "
                        value="{{old('format')}}"
                        placeholder="Формат"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="homework">Домашнее задание</label>
                        <input name="homework" class="form-control" id="homework "
                        value="{{old('homework')}}"
                        placeholder="Домашнее задание"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="requirements_for_students">Требования к студентам</label>
                        <input name="requirements_for_students" class="form-control" id="requirements_for_students "
                        value="{{old('requirements_for_students')}}"
                        placeholder="Требования к студентам"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="contacts">По всем вопросам</label>
                      <input name="contacts[name]" class="form-control"
                        value="{{old('contacts.name')}}"
                        placeholder="Имя"
                        type="text"
                      />
                      <input name="contacts[phone]" class="form-control"
                        value="{{old('contacts.phone')}}"
                        placeholder="Телефон"
                        type="text"
                      />
                      <input name="contacts[mail]" class="form-control"
                        value="{{old('contacts.mail')}}"
                        placeholder="E-mail"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="teacher">Преподаватель</label>
                      <input name="teacher[name]" class="form-control"
                        value="{{old('teacher.name')}}"
                        placeholder="Имя"
                        type="text"
                      />
                      <input name="teacher[position]teacher.position" class="form-control"
                        value="{{old('teacher.position')}}"
                        placeholder="Должность"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="image">Фото преподавателя (Не более 2 Мб)</label>
                      <input name="teacher_foto" id="image" value="" type="file">
                    </div>

                    <div class="form-group">
                      <label for="course_link">Ссылка на страницу курса</label>
                        <input name="course_link" class="form-control"
                        value="{{old('course_link')}}"
                        placeholder="http://example.site/some_course"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                        <label for="description">Подробное описание</label>
                        <textarea id="description"
                                  name="description"
                                  rows="5"
                                  cols="80"
                                  class="js-editor-enabled">
                                  {{old('description')}}
                       </textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Вставка кода яндекс-карты</label>
                        <textarea id="map_code"
                                  class="form-control"
                                  name="map_code"
                                  rows="5"
                                  cols="80">
                                  {{old('map_code')}}
                       </textarea>
                    </div>
					
					<div class="form-group">
                      <label for="reg_link">Ссылка на страницу регистрации на курс</label>
                        <input name="reg_link" class="form-control"
                        value="{{old('reg_link')}}"
                        placeholder="https://docs.google.com/spreadsheets/example"
                        type="text"
						/>
                    </div>

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="edit[submit]" value="1" class="btn btn-primary">Сохранить</button>
                  </div>
              </form>

                {{----------------------------------}}
            </div>
        </div>
    </div>
@endsection
