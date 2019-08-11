<?php
/**
 * @var \App\Domain\News\News[] $news
 */
?>
<div class="latest-news">
    <h3 class="latest-news__title line-bottom">Последние <a href="{{ route('news') }}" class="text-theme-colored">новости:</a></h3>
    <div class="latest-news__list">
        @foreach($news as $newsItem)
            <?php
            $route = route('news.item', [ 'news_slug' => $newsItem->slug ]);
            ?>
            <article class="news-item news-item_on-main">
                @if ($image = $newsItem->smallImagePath())
                    <a href="{{ $route }}" class="news-item__image pull-left col-md-4">
                        <img class="flip" src="{{ $image }}" alt="{{ $newsItem->title }}">
                    </a>
                @endif
                <div>
                    <a class="news-item__title" href="{{ $route }}">{{ $newsItem->title }}</a>
                    <div class="news-item__date">
                        {{ $newsItem->date->format('d') }}
                        {{ app('App\Locale\Date')->shortMonthName($newsItem->date->format('m')) }},
                        {{ $newsItem->date->format('Y') }}
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>