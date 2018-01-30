@extends('public.layout')

@section('content')
    <section class="inner-header divider parallax" data-bg-img="/images/sp/photo3.jpg" style="background-image: url(/images/sp/photo3.jpg); background-position: 50% -45px;">
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
    <section>
        <div class="container news-item">
            <section class="post">
                <article class="entry-content clearfix">
                    @if($image = $article->mediumImagePath())
                        <img class="col-md-6" alt="" src="{{ $image }}">
                    @endif
                    <h3 class="news-item__title">{{ $article->title }}</h3>
                    @if ($article->author)
                        <p><i class="fa fa-user mr-5 text-theme-colored"></i><strong>Автор:</strong> {{ $article->author }}</p>
                    @endif
                    <div class="news-item__header">
                        <div class="news-item__date pull-left col-md-1">
                            <div class="news-item__date-day">{{ app('App\Locale\Date')->shortMonthName($article->date->format('m')) }}</div>
                            <div class="news-item__date-month">{{ $article->date->format('Y') }}</div>
                        </div>
                        <div class="news-item__share share">
                            <span class="share__title">Поделиться:</span>
                            <span class="share__buttons">
                                <script type="text/javascript"><!--
                                    document.write(VK.Share.button(false,{type: "custom", text: "<img src=\"https://vk.com/images/share_32.png\" width=\"32\" height=\"32\" />"}));
                                --></script>
                            </span>
                        </div>
                    </div>
                    <div class="news-item__content wysiwyg">
                        {!! $article->content !!}
                    </div>
                    <div class="news-item__back-button">
                        <a href="{{ route('articles') }}" class="btn btn-theme-colored">Вернуться к списку статей</a>
                    </div>
                </article>
            </section>
        </div>
    </section>
@endsection