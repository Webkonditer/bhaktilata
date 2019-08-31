@extends('public.layout')

@section('content')
<section class="inner-header divider parallax hidden-xs" data-bg-img="/images/sp/photo2.jpg" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% -45px;">
  <div class="container pt-80 pb-20">
    <!-- Section Content -->
    <div class="section-content pt-140">
      <div class="row">
        <div class="col-md-12">
          @include('public.navigation.crumbs-menu')
        </div>
      </div>
    </div>
  </div>
</section>

{{-----------------------------------------------------------------------}}
<section>
  <div class="container">
    <div class="content">
      <style type="text/css">.nubex {
      font-size: 16px;
      }
      </style>
      <ul class="nav nav-tabs boot-tabs" id="myTab">
      <li class="active">
      <h4><a class="btn btn-border btn-theme-colored btn-lg" data-toggle="tab" href="#home">Базовый фильтр</a></h4>
      </li>
      <li>
      <h4><a class="btn btn-border btn-theme-colored btn-lg" data-toggle="tab" href="#profile">Подробный фильтр</a></h4>
      </li>
      </ul>

      <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade in active" id="home">
      <div class="row">
      <div class="col-md-2">
      <h3><i class="fa fa-comments-o mr-5 text-theme-colored"></i> Аудитория:</h3>
      </div>
      <form role="form" name="edit" action="{{ route('course_search.post1')}}" method="POST" enctype="multipart/form-data">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[1]" /> Совсем начинающие </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[2]" /> До первой инициации </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[3]" /> До второй инициации </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[4]" /> После второй инициации </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[5]" /> Лидеры </label></div>
        </div>

        <div class="col-md-2">
        <div class="text-center">
          <button type="submit" name="edit[submit]" value="1" class="btn btn-dark btn-theme-colored btn-circled btn">Поиск курса...</button>
        </div>
      </form>
      </div>
      </div>
      </div>

      <div class="tab-pane fade" id="profile">
      <h3><i class="fa fa-tags mr-5 text-theme-colored"></i> Темы:</h3>

      <div class="row">
      <div class="col-md-4">
      <p><i class="fa fa-book mr-5 text-theme-colored"></i><b> Изучение писаний</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Общая картина самбандхи </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Видение мира сквозь призму бхакти </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Бхагавад-гита </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Шримад Бхагаватам </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Чайтанья-чаритамрита </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Книги бхакти-шастр </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Другие книги </label></div>

      <p><i class="fa fa-users mr-5 text-theme-colored"></i><b> Шрила Прабхупада и парампара</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Шрила Прабхупада </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Предыдущие Ачарьи </label></div>
      </div>

      <div class="col-md-4">
      <p><i class="fa fa-university mr-5 text-theme-colored"></i><b> ИСККОН и общество преданных</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Организация </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Духовные учителя </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Общество преданных </label></div>

      <p><i class="fa fa-heart mr-5 text-theme-colored"></i><b> Прямые формы преданного служения</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Святое имя </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Поклонение Божествам </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Осознанная практика </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Другие анги </label></div>
      </div>

      <div class="col-md-4">
      <p><i class="fa fa-leaf mr-5 text-theme-colored"></i><b> Гуна благости</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Простая жизнь </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Этикет и распорядок жизни </label></div>

      <p><i class="fa fa-bolt mr-5 text-theme-colored"></i><b> Лидерское служение</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Духовное лидерство </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Управление и организация </label></div>

      <p><i class="fa fa-child mr-5 text-theme-colored"></i><b> Социальное и семейное образование</b></p>

      <div class="checkbox"><label><input type="checkbox" value="" /> Социальное </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Семейное </label></div>
      </div>

      <div class="separator" style="margin-top:1px; margin-bottom:1px;">&nbsp;</div>

      <div class="row">
      <div class="col-md-4">
      <h3><i class="fa fa-comments-o mr-5 text-theme-colored"></i> Аудитория:</h3>

      <div class="checkbox"><label><input type="checkbox" value="" /> Совсем начинающие </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> До первой инициации </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> До второй инициации </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> После второй инициации </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Лидеры </label></div>
      </div>

      <div class="col-md-4">
      <h3><i class="fa fa-mortar-board mr-5 text-theme-colored"></i> Формат:</h3>

      <div class="checkbox"><label><input type="checkbox" value="" /> Онлайн (с сопровождением) </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Онлайн (без сопровождения) </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Очный </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Материалы для скачивания </label></div>
      </div>

      <div class="col-md-4">
      <h3><i class="fa fa-clock-o mr-5 text-theme-colored"></i> Длительность:</h3>

      <div class="checkbox"><label><input type="checkbox" value="" /> Пара дней </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Месяц </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> От 1,5 до 4 месяцев </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> От 5 до 12 месяцев </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Больше 12 месяцев </label></div>

      <div class="checkbox"><label><input type="checkbox" value="" /> Клубный формат (без сроков) </label></div>
      </div>
      &nbsp;

      <div class="text-center"><a class="btn btn-dark btn-theme-colored btn-circled btn-xl" href="#">Поиск курса...</a></div>
      </div>
      </div>
      </div>
      </div>

      <p>&nbsp;</p>




      <div class="row">
        @if(isset($cards))

        @foreach ($cards as $card)
          <div class="col-md-6">
            <article class="post clearfix mb-30 bg-lighter">
              <div class="p-20 pr-10">
                <div class="mt-0 no-bg no-border">
                  <div class="pull-left col-md-4">
                    <img alt="" class="flip" src="{{ asset('/storage/'.$card["image"]) }}" />
                  </div>

                  <h3 align="center"><strong>{{ $card["title"] }}</strong></h3>

                  <p align="justify">{!! $card["description"] !!}</p>

                  <p><i class="fa fa-tags mr-5 text-theme-colored"></i><strong>Темы: </strong>{{ $card["topics"] }}</p>

                  <p><i class="fa fa-comments-o mr-5 text-theme-colored"></i><strong>Аудитория: </strong>{{ $card["audiences"] }}</p>

                  <p><i class="fa fa-user mr-5 text-theme-colored"></i><strong>Преподаватели: </strong>{{ $card["teachers"] }}</p>

                  <p><i class="fa fa-calendar mr-5 text-theme-colored"></i><strong>Начало обучения: </strong>{{ $card["date_start"] }}</p>

                  <p><i class="fa fa-clock-o mr-5 text-theme-colored"></i><strong>Длительность: </strong>{{ $card["durations"] }}</p>

                  <p><i class="fa fa-mortar-board mr-5 text-theme-colored"></i><strong>Формат: </strong>{{ $card["formats"] }}</p>

                  <div class="text-center"><a class="btn btn-theme-colored" href="{{ $card["course_link"] }}">Узнать подробее!</a></div>

                  <div class="clearfix">&nbsp;</div>
                </div>
              </div>
            </article>
          </div>
      @endforeach
      @else
        <div class="tab-content">По заданным Вами критериям ничего не найдено.</div>
      @endif

      <div style="clear:both">&nbsp;</div>
    </div>

      <p>&nbsp;</p>
    </div>
  </div>
        <!-- end main-content -->
@endsection
