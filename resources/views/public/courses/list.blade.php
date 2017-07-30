<?php
/**
 * @var \App\Courses\Course $course
 */
?>
@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1080" style="background-image: url(&quot;http://placehold.it/1920x1080&quot;); background-position: 50% 62px;">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">Курсы</h3>
                        @include('public.navigation.crumbs-menu')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h1>{{ !empty($category) ? $category->title : 'Курсы' }}</h1>
            <div class="row multi-row-clearfix">
                @foreach($courses as $course)
                    <?php
                    $route = route('courses.course', [
                        'course_category_slug' => $course->category->slug,
                        'course_slug' => $course->slug,
                    ]);
                    ?>
                    <div class="col-md-4">
                        <article class="course clearfix mb-30 bg-lighter">
                            <div class="entry-header">
                                <a href="{{ $route }}" class="thumb">
                                    <img src="http://placehold.it/540x370" alt="" class="img-responsive img-fullwidth">
                                </a>
                            </div>
                            <div class="entry-content p-20 pr-10">
                                <div class="entry-meta media mt-0 no-bg no-border">
                                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">28</li>
                                            <li class="font-12 text-white text-uppercase">Feb</li>
                                        </ul>
                                    </div>
                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="{{ $route }}">{{ $course->title }}</a></h4>
                                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-10">{!! $course->announce !!}</p>
                                <a href="{{ $route }}" class="btn-read-more">Узнать больше</a>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection