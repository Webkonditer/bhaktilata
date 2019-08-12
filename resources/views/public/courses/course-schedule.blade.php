<?php
/**
 * @var \App\Domain\Courses\CourseEvent[] $events
 */
?>
@extends('public.layout')

@section('content')
<section class="inner-header divider parallax hidden-xs layer-overlay overlay-dark-5" data-bg-img="/images/sp/photo3.jpg" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% 70px;">
    <div class="container pt-60 pb-40">
        <!-- Section Content -->
        <div class="section-content pt-100">
            <div class="row">
                <div class="col-md-12">
                    @include('public.navigation.crumbs-menu')
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
    <div class="section-title text-center">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="mt-0">Расписание очных курсов</h1>

                <div class="title-icon"><i class="fa fa-calendar-check-o fa-3x"></i></div>
            </div>
        </div>
    </div>

    <section class="cd-container" id="cd-timeline">

        @foreach($schedules as $schedule)
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                <div class="cd-timeline-content bg-light">
                    <?php $image = '/storage/'.$schedule->teacher_foto ?:'/images/sp/3.jpg'; ?>
                    <div class="layer-overlay overlay-dark-5 img-fullwidth hvr-grow-rotate" data-bg-img="@if($schedule->teacher_foto){{asset('/storage/'.$schedule->teacher_foto)}} @else /images/sp/3.jpg @endif">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h3 class="text-white">{{ $schedule->courselist->course }}</h3>
                                </div>
                                &nbsp;
                                <div class="col-md-offset-1">
                                    <h4><span class="text-theme-colored"> Даты:</span><span style="color:#ffffff"> {{ date ('d.m.Y', strtotime($schedule->beginning_date)) }} - {{ date ('d.m.Y', strtotime($schedule->expiration_date)) }}</span></h4>

                                    <h4><span class="text-theme-colored"> Город:</span><span style="color:#ffffff"> {{ $schedule->city }}</span></h4>

                                    @if ($schedule->teacher)
                                        <h4><span class="text-theme-colored"> Ведущий:</span><span style="color:#ffffff"> {{ json_decode($schedule->teacher, TRUE)['name'] }}</span></h4>
                                    @endif
                                    <h4 class="text-white">Регистрация:<strong>
                                        @if ($schedule->is_opened)
                                            <span style="color:#41d200;">Открыта</span>
                                        @else
                                            <span style="color:#ff9900;">Закрыта</span>
                                        @endif
                                    </strong></h4>
                                </div>
                                &nbsp;

                                <div class="text-center"><a class="btn btn-theme-colored btn-lg" href="{{ $schedule->course_link }}">Узнать подробнее!</a></div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    </div>
</section>
@endsection
