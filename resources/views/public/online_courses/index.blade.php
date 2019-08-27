@extends('public.layout')

@section('content')
<section class="inner-header divider parallax hidden-xs" data-bg-img="{{ $onlinecourse->top_image }}" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% -45px;">
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
            <div class="content"><h2 align="center">{{ $onlinecourse->title }}</h2><h2 align="center">&nbsp;</h2><br />
<div class="row">
<div class="col-md-6">
{!! $onlinecourse->description !!}

{!! $onlinecourse->benefits_list !!}
<br />
</div>
<div class="col-md-6">
<p><img alt="" src="{{ asset('/storage/'.$onlinecourse->side_picture) }}" /></p>
</div>
</div>
<div class="panel panel-default col-md-12">
<div class="panel-group accordion transparent" id="accordion1">
<div class="panel">
<div class="panel-title"><a aria-expanded="true" data-parent="#accordion1" data-toggle="collapse" href="#accordion11"><span class="open-sub"></span><i class="fa fa-sticky-note-o mr-5 text-theme-colored"></i><b> Детали по курсу:</b></a></div>
<div aria-expanded="true" class="panel-collapse collapse in" id="accordion11" role="tablist">
<div class="panel-content">
<div class="row">
<div class="col-md-6">
<p><i class="fa fa-tags mr-5 text-theme-colored"></i><b> Темы:</b> {{ $topics }}</p>
<p><i class="fa fa-calendar mr-5 text-theme-colored"></i><b> Начало обучения:</b> {{ $onlinecourse->date_start }}</p>
<p><i class="fa fa-comments-o mr-5 text-theme-colored"></i><b> Аудитория:</b> {{ $audience }}</p>
</div>
<div class="col-md-6">
<p><i class="fa fa-key mr-5 text-theme-colored"></i><b>Особые требования:</b>{{ $onlinecourse->special_requirements }}</p>
<p><i class="fa fa-clock-o mr-5 text-theme-colored"></i><b>Длительность:</b>{{ $onlinecourse->duration }}</p>
<p><i class="fa fa-mortar-board mr-5 text-theme-colored"></i><b>Формат:</b>{{ $onlinecourse->format }}</p>
</div>



</div>
</div>
</div>
</div>
</div>
</div>


<div class="panel panel-default col-md-12">
<div class="panel-group accordion transparent" id="accordion2">
<div class="panel">
<div class="panel@endforeach-title"><a aria-expanded="true" data-parent="#accordion2" data-toggle="collapse" href="#accordion21"><span class="open-sub"></span><i class="fa fa-users mr-5 text-theme-colored"></i> <b>Наши преподаватели</b></a></div>

<div aria-expanded="true" class="panel-collapse collapse in" id="accordion21" role="tablist">
<div class="panel-content">

  @foreach ($teachers as $teacher)

      <div class="row">
        <p>&nbsp;</p>

        <div class="pull-left col-md-2"><img alt="" class="flip" src="{{ asset('/storage/'.$teacher->foto) }}" /></div>

        <div class="col-md-10"><b>{{ $teacher->name }}</b>

          <p>&nbsp;</p>

          <p>{{ $teacher->description }}</p>
        </div>
      </div>

    @endforeach

</div>
</div>
</div>
</div>
</div>


<p></p>
<br>
<h3 align="center"><i class="fa fa-user-plus mr-5 text-theme-colored"></i><strong>Заинтересовались? Тогда записывайтесь!</strong></h3>
<div class="text-center"><br><a href="{{ $onlinecourse->registration_link }}" target="_blank" class="btn btn-theme-colored btn-xl">Зарегистрироваться</a><br><br></div></div>
        </div>
    </section>
        </div>
        <!-- end main-content -->
@endsection
