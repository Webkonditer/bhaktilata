<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Новая карточка онлайн курса</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Создание новой карточки онлайн курса</h2>
                {{-----------------------------}}

                <form role="form" name="edit" action="{{ route('admin.cardofcourses.store')}}" method="POST" enctype="multipart/form-data">

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

                    <div class="form-group">
                      <label for="image">Изображение</label>
                      <input name="picture" id="image" value="" type="file">
                    </div>

                    <div class="form-group">
                      <label for="title">Название</label>
                      <input name="title" class="form-control" id="city"
                        value="{{old('title')}}"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea id="description"
                                  name="description"
                                  rows="5"
                                  cols="80"
                                  class="js-editor-enabled">
                                  {{old('description')}}
                       </textarea>
                    </div>

                    <div class="form-group">
                      <label for="topics">Темы:</label>
                      <p class="tab mb5 mt10">1. Изучение писаний</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[1]" id="" @if("on"==old('topics.1')) checked @endif >
                      &nbsp;&nbsp;a. Общая картина самбандхи
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[2]" id="" @if("on"==old('topics.2')) checked @endif>
                      &nbsp;&nbsp;b. Видение мира сквозь призму бхакти
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[3]" id="" @if("on"==old('topics.3')) checked @endif>
                      &nbsp;&nbsp;c. Бхагавад-гита
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[4]" id="" @if("on"==old('topics.4')) checked @endif>
                      &nbsp;&nbsp;d. Шримад Бхагаватам
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[5]" id="" @if("on"==old('topics.5')) checked @endif>
                      &nbsp;&nbsp;e. Чайтанья Чаритамрита
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[6]" id="" @if("on"==old('topics.6')) checked @endif>
                      &nbsp;&nbsp;f. Бхакти-шастры
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[7]" id="" @if("on"==old('topics.7')) checked @endif>
                      &nbsp;&nbsp;g. Другие книги
                      </div>
                      <br />
                      <p class="tab mb5 mt10">2. Шрила Прабхупада и парампара</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[8]" id="" @if("on"==old('topics.8')) checked @endif>
                      &nbsp;&nbsp;a. Личность Шрилы Прабхупады
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[9]" id="" @if("on"==old('topics.9')) checked @endif>
                      &nbsp;&nbsp;b. Предыдущие Ачарьи
                      </div>
                      <br />
                      <p class="tab mb5 mt10">3. ИСККОН и общество преданных</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[10]" id="" @if("on"==old('topics.10')) checked @endif>
                      &nbsp;&nbsp;a. Организация
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[11]" id="" @if("on"==old('topics.11')) checked @endif>
                      &nbsp;&nbsp;b. Духовные учителя
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[12]" id="" @if("on"==old('topics.12')) checked @endif>
                      &nbsp;&nbsp;c. Общество преданных
                      </div>
                      <br />
                      <p class="tab mb5 mt10">4. Прямые формы преданного служения</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[13]" id="" @if("on"==old('topics.13')) checked @endif>
                      &nbsp;&nbsp;a. Святое имя
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[14]" id="" @if("on"==old('topics.14')) checked @endif>
                      &nbsp;&nbsp;b. Поклонение Божествам
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[15]" id="" @if("on"==old('topics.15')) checked @endif>
                      &nbsp;&nbsp;c. Осознанная практика
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[16]" id="" @if("on"==old('topics.16')) checked @endif>
                      &nbsp;&nbsp;d. Другие анги
                      </div>
                      <br />
                      <p class="tab mb5 mt10">5. Гуна благости</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[17]" id="" @if("on"==old('topics.17')) checked @endif>
                      &nbsp;&nbsp;a. Простая жизнь
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[18]" id="" @if("on"==old('topics.18')) checked @endif>
                      &nbsp;&nbsp;b. Этикет и распорядок жизни
                      </div>
                      <br />
                      <p class="tab mb5 mt10">6. Лидерское служение</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[19]" id="" @if("on"==old('topics.19')) checked @endif>
                      &nbsp;&nbsp;a. Духовное лидерство
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[20]" id="" @if("on"==old('topics.20')) checked @endif>
                      &nbsp;&nbsp;b. Управление и организация
                      </div>
                      <br />
                      <p class="tab mb5 mt10">7. Социальное и семейное образование</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[21]" id="" @if("on"==old('topics.21')) checked @endif>
                      &nbsp;&nbsp;a. Социальное и семейное образование
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="date_start">Начало обучения</label>
                      <input name="date_start" class="form-control" id="city"
                        value="{{old('date_start')}}"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="topics">Аудитория:</label>
                      <div class="tab2">
                        <input type="checkbox" name="audience[1]" id="" @if("on"==old('audience.1')) checked @endif>
                      &nbsp;&nbsp;Совсем начинающие
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[2]" id="" @if("on"==old('audience.2')) checked @endif>
                      &nbsp;&nbsp;До первой инициации
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[3]" id="" @if("on"==old('audience.3')) checked @endif>
                      &nbsp;&nbsp;До второй инициации
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[4]" id="" @if("on"==old('audience.4')) checked @endif>
                      &nbsp;&nbsp;После второй инициации
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[5]" id="" @if("on"==old('audience.5')) checked @endif>
                      &nbsp;&nbsp;Лидеры
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="topics">Длительность:</label>
                      <div class="tab2">
                        <input type="checkbox" name="duration[1]" id="" @if("on"==old('duration.1')) checked @endif >
                      &nbsp;&nbsp;Пара дней
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[18]" id="" @if("on"==old('duration.18')) checked @endif>
                      &nbsp;&nbsp;Клубный формат (без сроков)
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[3]" id="" @if("on"==old('duration.3')) checked @endif>
                      &nbsp;&nbsp;Месяц
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[4]" id="" @if("on"==old('duration.4')) checked @endif>
                      &nbsp;&nbsp;1,5 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[5]" id="" @if("on"==old('duration.5')) checked @endif>
                      &nbsp;&nbsp;2 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[6]" id="" @if("on"==old('duration.6')) checked @endif>
                      &nbsp;&nbsp;3 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[7]" id="" @if("on"==old('duration.7')) checked @endif>
                      &nbsp;&nbsp;4 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[8]" id="" @if("on"==old('duration.8')) checked @endif>
                      &nbsp;&nbsp;5 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[9]" id="" @if("on"==old('duration.9')) checked @endif>
                      &nbsp;&nbsp;6 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[10]" id="" @if("on"==old('duration.10')) checked @endif>
                      &nbsp;&nbsp;7 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[11]" id="" @if("on"==old('duration.11')) checked @endif>
                      &nbsp;&nbsp;8 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[12]" id="" @if("on"==old('duration.12')) checked @endif>
                      &nbsp;&nbsp;9 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[13]" id="" @if("on"==old('duration.13')) checked @endif>
                      &nbsp;&nbsp;10 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[15]" id="" @if("on"==old('duration.15')) checked @endif>
                      &nbsp;&nbsp;11 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[16]" id="" @if("on"==old('duration.16')) checked @endif>
                      &nbsp;&nbsp;12 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[17]" id="" @if("on"==old('duration.17')) checked @endif>
                      &nbsp;&nbsp;Больше года
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="format">Формат курса:</label>
                      <div class="tab2">
                        <input type="checkbox" name="format[1]" id="" @if("on"==old('format.1')) checked @endif >
                      &nbsp;&nbsp;Онлайн (с сопровождением)
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="format[2]" id="" @if("on"==old('format.2')) checked @endif>
                      &nbsp;&nbsp;Онлайн (без сопровождения)
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="format[3]" id="" @if("on"==old('format.3')) checked @endif>
                      &nbsp;&nbsp;Очный
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="format[4]" id="" @if("on"==old('format.4')) checked @endif>
                      &nbsp;&nbsp;Материалы для скачивания
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="course">Выберите преподавателей</label>
                          @foreach ($teachers as $teacher)
                            <div class="tab2">
                              <input type="checkbox" name="teacher[{{ $teacher->id }}]" id="" @if("on"==old('teacher.'.$teacher->id)) checked @endif>
                            &nbsp;&nbsp;{{ $teacher->name }}
                            </div>
                          @endforeach
                    </div>

                    <div class="form-group">
                      <label for="title">Кнопка: Подробнее</label>
                      <input name="course_link" class="form-control" id=""
                        value="{{old('course_link')}}"
                        placeholder="ссылка на страницу курса"
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
