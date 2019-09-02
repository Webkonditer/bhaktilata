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
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <ul class="nav nav-tabs boot-tabs" id="myTab">
      <li class="active">
      <h4><a class="btn btn-border btn-theme-colored btn-lg" data-toggle="tab" href="#home">Базовый фильтр</a></h4>
      </li>
      <li>
      <h4><a class="btn btn-border btn-theme-colored btn-lg" data-toggle="tab" href="#profile">Подробный фильтр</a></h4>
      </li>
      </ul>

      <div class="tab-content" id="myTabContent">
      <div class="tab-pane @if(isset($filter2))fade @else fade in active @endif" id="home">
      <div class="row">
      <div class="col-md-2">
      <h3><i class="fa fa-comments-o mr-5 text-theme-colored"></i> Аудитория:</h3>
      </div>
      <form role="form" name="edit" action="{{ route('online.post')}}" method="POST" enctype="multipart/form-data">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[1]"
          @foreach ($audiences as $audience)
            @if($audience == "1") checked @endif
          @endforeach
        /> Совсем начинающие </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[2]"
          @foreach ($audiences as $audience)
            @if($audience == "2") checked @endif
          @endforeach
         /> До первой инициации </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[3]"
          @foreach ($audiences as $audience)
            @if($audience == "3") checked @endif
          @endforeach
         /> До второй инициации </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[4]"
          @foreach ($audiences as $audience)
            @if($audience == "4") checked @endif
          @endforeach
         /> После второй инициации </label></div>
        </div>

        <div class="col-md-2">
        <div class="checkbox"><label><input type="checkbox" name="audience[5]"
          @foreach ($audiences as $audience)
            @if($audience == "5") checked @endif
          @endforeach
         /> Лидеры </label></div>
        </div>

        <div class="col-md-2">
        <div class="text-center">
          <button type="submit" name="submit" value="1" class="btn btn-dark btn-theme-colored btn-circled btn">Поиск курса...</button>
        </div>
      </form>
      </div>
      </div>
      </div>



      <div class="tab-pane @if(isset($filter2))fade in active @else fade @endif" id="profile">

      <form role="form" name="edit" action="{{ route('online.post')}}" method="POST" enctype="multipart/form-data">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <input name="filter2" value="on" type="hidden">
        <h3><i class="fa fa-tags mr-5 text-theme-colored"></i> Темы:</h3>

        <div class="row">
        <div class="col-md-4">
          <p><i class="fa fa-book mr-5 text-theme-colored"></i><b> Изучение писаний</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[1]"
            @foreach ($topics as $topic)
              @if($topic == "1") checked @endif
            @endforeach
          /> Общая картина самбандхи </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[2]"
            @foreach ($topics as $topic)
              @if($topic == "2") checked @endif
            @endforeach
          /> Видение мира сквозь призму бхакти </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[3]"
            @foreach ($topics as $topic)
              @if($topic == "3") checked @endif
            @endforeach
          /> Бхагавад-гита </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[4]"
            @foreach ($topics as $topic)
              @if($topic == "4") checked @endif
            @endforeach
          /> Шримад Бхагаватам </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[5]"
            @foreach ($topics as $topic)
              @if($topic == "5") checked @endif
            @endforeach
          /> Чайтанья-чаритамрита </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[6]"
            @foreach ($topics as $topic)
              @if($topic == "6") checked @endif
            @endforeach
          /> Книги бхакти-шастр </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[7]"
            @foreach ($topics as $topic)
              @if($topic == "7") checked @endif
            @endforeach
          /> Другие книги </label></div>

          <p><i class="fa fa-users mr-5 text-theme-colored"></i><b> Шрила Прабхупада и парампара</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[8]"
            @foreach ($topics as $topic)
              @if($topic == "8") checked @endif
            @endforeach
          /> Шрила Прабхупада </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[9]"
            @foreach ($topics as $topic)
              @if($topic == "9") checked @endif
            @endforeach
          /> Предыдущие Ачарьи </label></div>
        </div>

        <div class="col-md-4">
          <p><i class="fa fa-university mr-5 text-theme-colored"></i><b> ИСККОН и общество преданных</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[10]"
            @foreach ($topics as $topic)
              @if($topic == "10") checked @endif
            @endforeach
          /> Организация </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[11]"
            @foreach ($topics as $topic)
              @if($topic == "11") checked @endif
            @endforeach
          /> Духовные учителя </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[12]"
            @foreach ($topics as $topic)
              @if($topic == "12") checked @endif
            @endforeach
          /> Общество преданных </label></div>

          <p><i class="fa fa-heart mr-5 text-theme-colored"></i><b> Прямые формы преданного служения</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[13]"
            @foreach ($topics as $topic)
              @if($topic == "13") checked @endif
            @endforeach
          /> Святое имя </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[14]"
            @foreach ($topics as $topic)
              @if($topic == "14") checked @endif
            @endforeach
          /> Поклонение Божествам </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[15]"
            @foreach ($topics as $topic)
              @if($topic == "15") checked @endif
            @endforeach
          /> Осознанная практика </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[16]"
            @foreach ($topics as $topic)
              @if($topic == "16") checked @endif
            @endforeach
          /> Другие анги </label></div>
        </div>

        <div class="col-md-4">
          <p><i class="fa fa-leaf mr-5 text-theme-colored"></i><b> Гуна благости</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[17]"
            @foreach ($topics as $topic)
              @if($topic == "17") checked @endif
            @endforeach
          /> Простая жизнь </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[18]"
            @foreach ($topics as $topic)
              @if($topic == "18") checked @endif
            @endforeach
          /> Этикет и распорядок жизни </label></div>

          <p><i class="fa fa-bolt mr-5 text-theme-colored"></i><b> Лидерское служение</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[19]"
            @foreach ($topics as $topic)
              @if($topic == "19") checked @endif
            @endforeach
          /> Духовное лидерство </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[20]"
            @foreach ($topics as $topic)
              @if($topic == "20") checked @endif
            @endforeach
          /> Управление и организация </label></div>

          <p><i class="fa fa-child mr-5 text-theme-colored"></i><b> Социальное и семейное образование</b></p>

          <div class="checkbox"><label><input type="checkbox" name="topic[21]"
            @foreach ($topics as $topic)
              @if($topic == "21") checked @endif
            @endforeach
          /> Социальное </label></div>

          <div class="checkbox"><label><input type="checkbox" name="topic[22]"
            @foreach ($topics as $topic)
              @if($topic == "22") checked @endif
            @endforeach
          /> Семейное </label></div>
        </div>

        <div class="separator" style="margin-top:1px; margin-bottom:1px;">&nbsp;</div>

        <div class="row">
        <div class="col-md-4">
          <h3><i class="fa fa-comments-o mr-5 text-theme-colored"></i> Аудитория:</h3>

          <div class="checkbox"><label><input type="checkbox" name="audience[1]"
            @foreach ($audiences as $audience)
              @if($audience == "1") checked @endif
            @endforeach
           /> Совсем начинающие </label></div>

          <div class="checkbox"><label><input type="checkbox" name="audience[2]"
            @foreach ($audiences as $audience)
              @if($audience == "2") checked @endif
            @endforeach
           /> До первой инициации </label></div>

          <div class="checkbox"><label><input type="checkbox" name="audience[3]"
            @foreach ($audiences as $audience)
              @if($audience == "3") checked @endif
            @endforeach
           /> До второй инициации </label></div>

          <div class="checkbox"><label><input type="checkbox" name="audience[4]"
            @foreach ($audiences as $audience)
              @if($audience == "4") checked @endif
            @endforeach
           /> После второй инициации </label></div>

          <div class="checkbox"><label><input type="checkbox" name="audience[5]"
            @foreach ($audiences as $audience)
              @if($audience == "5") checked @endif
            @endforeach
           /> Лидеры </label></div>
        </div>

        <div class="col-md-4">
          <h3><i class="fa fa-mortar-board mr-5 text-theme-colored"></i> Формат:</h3>

          <div class="checkbox"><label><input type="checkbox" name="format[1]"
            @foreach ($formats as $format)
              @if($format == "1") checked @endif
            @endforeach
           /> Онлайн (с сопровождением) </label></div>

          <div class="checkbox"><label><input type="checkbox" name="format[2]"
            @foreach ($formats as $format)
              @if($format == "2") checked @endif
            @endforeach
           /> Онлайн (без сопровождения) </label></div>

          <div class="checkbox"><label><input type="checkbox" name="format[3]"
            @foreach ($formats as $format)
              @if($format == "3") checked @endif
            @endforeach
           /> Очный </label></div>

          <div class="checkbox"><label><input type="checkbox" name="format[4]"
            @foreach ($formats as $format)
              @if($format == "4") checked @endif
            @endforeach
           /> Материалы для скачивания </label></div>
        </div>

        <div class="col-md-4">
          <h3><i class="fa fa-clock-o mr-5 text-theme-colored"></i> Длительность:</h3>

          <div class="checkbox"><label><input type="checkbox" name="duration[1]"
            @foreach ($durations as $duration)
              @if($duration == "1") checked @endif
            @endforeach
           /> Пара дней </label></div>

          <div class="checkbox"><label><input type="checkbox" name="duration[2]"
            @foreach ($durations as $duration)
              @if($duration == "2") checked @endif
            @endforeach
           /> Месяц </label></div>

          <div class="checkbox"><label><input type="checkbox" name="duration[3]"
            @foreach ($durations as $duration)
              @if($duration == "3") checked @endif
            @endforeach
           /> От 1,5 до 4 месяцев </label></div>

          <div class="checkbox"><label><input type="checkbox" name="duration[4]"
            @foreach ($durations as $duration)
              @if($duration == "4") checked @endif
            @endforeach
           /> От 5 до 12 месяцев </label></div>

          <div class="checkbox"><label><input type="checkbox" name="duration[5]"
            @foreach ($durations as $duration)
              @if($duration == "5") checked @endif
            @endforeach
           /> Больше 12 месяцев </label></div>

          <div class="checkbox"><label><input type="checkbox" name="duration[6]"
            @foreach ($durations as $duration)
              @if($duration == "6") checked @endif
            @endforeach
           /> Клубный формат (без сроков) </label></div>
        </div>
        &nbsp;

        <div class="text-center">
          <button type="submit" name="submit" value="1" class="btn btn-dark btn-theme-colored btn-circled btn-xl">Поиск курса...</button>
        </div>
        </div>
      </form>
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
