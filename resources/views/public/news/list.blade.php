<?php
/**
 * @var \App\Domain\News\News[] $news
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
            <div class="content">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h1 class="mt-0">Свежие новости</h1>
                            <div class="title-icon">
                                <i class="fa fa-newspaper-o fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="container col-md-12 pt-0">
                    <div class="blog-posts row auto-clear">
                        @foreach ($news as $newsItem)
                            <?php
                            $route = route('news.item', [ 'news_slug' => $newsItem->slug ]);
                            ?>
                            <div class="col-md-4">
                                <article class="post clearfix mb-30 bg-lighter">
                                    @if ($image = $newsItem->smallImagePath())
                                        <div class="entry-header">
                                            <a href="{{ $route }}"class="post-thumb thumb">
                                                <img src="{{ $image }}" alt="" class="img-responsive img-fullwidth">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="entry-content p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600">{{ $newsItem->date->format('d') }}</li>
                                                    <li class="font-12 text-white text-uppercase">{{ app('App\Locale\Date')->shortMonthName($newsItem->date->format('m')) }}</li>
                                                </ul>
                                            </div>
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="{{ $route }}">{{ $newsItem->title }}</a></h4>
                                                </div>
                                            </div>
                                        </div><br><br>
                                        <div class="text-center"><a href="{{ $route }}" class="btn btn-theme-colored">Читать!</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ $paginator->links('public.pagination') }}
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection