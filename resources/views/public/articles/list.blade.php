<?php
/**
 * @var \App\Domain\Articles\Article[] $news
 */
?>
@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/sp/photo3.jpg" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% 70px;">
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
                            <h1 class="mt-0">Интересные статьи</h1>
                            <div class="title-icon">
                                <i class="fa fa-edit fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="container col-md-12 pt-0">
                    <div class="blog-posts row auto-clear">
                        @foreach ($articles as $article)
                            <?php
                            $route = route('articles.article', [ 'article_slug' => $article->slug ]);
                            ?>
                            <div class="col-md-4">
                                <article class="post clearfix mb-30 bg-lighter">
                                    @if ($image = $article->smallImagePath())
                                        <div class="entry-header">
                                            <a href="{{ $route }}"class="post-thumb thumb">
                                                <img src="{{ $image }}" alt="" class="img-responsive img-fullwidth">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="entry-content p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body text-center">
                                                <div class="event-content flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="{{ $route }}">{{ $article->title }}</a></h4>
                                                </div>
                                            </div>
                                        </div><br/>
                                        @if ($article->author)
                                            <p><i class="fa fa-user mr-5 text-theme-colored"></i><strong>Автор:</strong> {{ $article->author }}</p>
                                        @endif
                                        @if ($article->announce)
                                            <p><i class="fa fa-pencil mr-5 text-theme-colored"></i><strong>Описание: </strong>{{ $article->announce }}</p>
                                        @endif
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