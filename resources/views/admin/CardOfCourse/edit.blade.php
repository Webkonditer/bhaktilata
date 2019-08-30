<?php
/**
 * @var \App\Pages\Page $page
 */
?>
@extends('admin.layout')

@section('crumbs')<li class="active">Изменить карточку онлайн курса</li>@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <h2>Изменение карточки онлайн курса</h2>
                {{-----------------------------}}

                <form role="form" name="edit" action="{{ route('admin.cardofcourses.update', $cardofcourse)}}" method="POST" enctype="multipart/form-data">

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
                        value="@if(old('title')){{old('title')}} @else{{$cardofcourse->title}} @endif"
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
                                  @if(old('description')){{old('description')}} @else{{$cardofcourse->description}} @endif
                       </textarea>
                    </div>



                    //-----------------------------------



                    <div class="form-group">
                      <label for="topics">Темы:</label>
                      <p class="tab mb5 mt10">1. Изучение писаний</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[1]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "1") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Общая картина самбандхи
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[2]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "2") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;b. Видение мира сквозь призму бхакти
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[3]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "3") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;c. Бхагавад-гита
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[4]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "4") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;d. Шримад Бхагаватам
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[5]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "5") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;e. Чайтанья Чаритамрита
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[6]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "6") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;f. Бхакти-шастры
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[7]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "7") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;g. Другие книги
                      </div>
                      <br />
                      <p class="tab mb5 mt10">2. Шрила Прабхупада и парампара</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[8]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "8") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Личность Шрилы Прабхупады
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[9]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "9") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;b. Предыдущие Ачарьи
                      </div>
                      <br />
                      <p class="tab mb5 mt10">3. ИСККОН и общество преданных</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[10]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "10") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Организация
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[11]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "11") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;b. Духовные учителя
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[12]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "12") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;c. Общество преданных
                      </div>
                      <br />
                      <p class="tab mb5 mt10">4. Прямые формы преданного служения</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[13]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "13") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Святое имя
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[14]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "14") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;b. Поклонение Божествам
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[15]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "15") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;c. Осознанная практика
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[16]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "16") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;d. Другие анги
                      </div>
                      <br />
                      <p class="tab mb5 mt10">5. Гуна благости</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[17]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "17") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Простая жизнь
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[18]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "18") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;b. Этикет и распорядок жизни
                      </div>
                      <br />
                      <p class="tab mb5 mt10">6. Лидерское служение</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[19]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "19") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Духовное лидерство
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="topics[20]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "20") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;b. Управление и организация
                      </div>
                      <br />
                      <p class="tab mb5 mt10">7. Социальное и семейное образование</p>
                      <div class="tab2">
                        <input type="checkbox" name="topics[21]" id=""
                          @foreach ($topics as $topic)
                            @if($topic == "21") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;a. Социальное и семейное образование
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="date_start">Начало обучения</label>
                      <input name="date_start" class="form-control" id="city"
                        value="@if(old('date_start')){{old('date_start')}} @else{{$cardofcourse->date_start}} @endif"
                        type="text"
                      />
                    </div>

                    <div class="form-group">
                      <label for="topics">Аудитория:</label>
                      <div class="tab2">
                        <input type="checkbox" name="audience[1]" id=""
                          @foreach ($audiences as $audience)
                            @if($audience == "1") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;Совсем начинающие
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[2]" id=""
                          @foreach ($audiences as $audience)
                            @if($audience == "2") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;До первой инициации
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[3]" id=""
                          @foreach ($audiences as $audience)
                            @if($audience == "3") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;До второй инициации
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[4]" id=""
                          @foreach ($audiences as $audience)
                            @if($audience == "4") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;После второй инициации
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="audience[5]" id=""
                          @foreach ($audiences as $audience)
                            @if($audience == "5") checked @endif
                          @endforeach
                        >
                      &nbsp;&nbsp;Лидеры
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="topics">Длительность:</label>
                      <div class="tab2">
                        <input type="checkbox" name=" duration[1]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "5") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Пара дней
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[18]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "18") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Клубный формат (без сроков)
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[3]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "3") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Месяц
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[4]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "4") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;1,5 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[5]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "5") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;2 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[6]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "6") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;3 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[7]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "7") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;4 месяца
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[8]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "8") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;5 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[9]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "9") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;6 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[10]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "10") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;7 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[11]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "11") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;8 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[12]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "12") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;9 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[13]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "13") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;10 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[15]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "15") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;11 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[16]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "16") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;12 месяцев
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="duration[17]" id=""
                        @foreach ($durations as $duration)
                          @if($duration == "17") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Больше года
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="format">Формат курса:</label>
                      <div class="tab2">
                        <input type="checkbox" name=" format[1]" id=""
                        @foreach ($formats as $format)
                          @if($format == "1") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Онлайн (с сопровождением)
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="format[2]" id=""
                        @foreach ($formats as $format)
                          @if($format == "2") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Онлайн (без сопровождения)
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="format[3]" id=""
                        @foreach ($formats as $format)
                          @if($format == "3") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Очный
                      </div>
                      <div class="tab2">
                        <input type="checkbox" name="format[4]" id=""
                        @foreach ($formats as $format)
                          @if($format == "4") checked @endif
                        @endforeach
                        >
                      &nbsp;&nbsp;Материалы для скачивания
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="course">Выберите преподавателей</label>
                          @foreach ($teachers as $teacher)
                            <div class="tab2">
                              <input type="checkbox" name="teacher[{{ $teacher->id }}]" id=""
                                @foreach ($ch_teachers as $ch_teacher)
                                  @if($ch_teacher == $teacher->id) checked @endif
                                @endforeach
                              >
                            &nbsp;&nbsp;{{ $teacher->name }}
                            </div>
                          @endforeach
                    </div>

                    <div class="form-group">
                      <label for="title">Кнопка: Подробнее</label>
                      <input name="course_link" class="form-control" id=""
                      value="@if(old('course_link')){{old('course_link')}} @else{{$cardofcourse->course_link}} @endif"
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
