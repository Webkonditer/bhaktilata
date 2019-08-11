<?php
/**
 * @var \App\Domain\Articles\Article[] $articles
 */
?>
<div class="latest-articles">
    <h3 class="latest-articles__title line-bottom">Новые <a href="{{ route('articles') }}" class="text-theme-colored">статьи:</a></h3>
    <div class="latest-articles__list">
        <?php /** @var \App\Domain\Articles\Article $article */ ?>
        @foreach($articles as $article)
            <?php
            $route = route('articles.article', [ 'article_slug' => $article->slug ]);
            ?>
            <div class="col-md-6">
                <article class="post clearfix mb-30 bg-lighter">
                    <div class="entry-header">
                        @if ($image = $article->smallImagePath())
                            <a href="{{ $route }}" class="post-thumb thumb">
                                <img src="{{ $image }}" alt="{{ $article->title }}" class="img-responsive img-fullwidth">
                            </a>
                        @endif
                    </div>
                    <div class="entry-content">
                        <div class="entry-meta media no-bg no-border">
                            <div class="media-body">
                                <h3 align="center" class="title"><a href="{{ $route }}">{{ $article->title }}</a></h3>
                            </div>
                        </div>
                        @if ($article->author)
                            <p><i class="fa fa-user mr-5 text-theme-colored"></i><strong>Автор: </strong>{{ $article->author }}</p>
                        @endif
                        @if ($article->announce)
                            <p><i class="fa fa-pencil mr-5 text-theme-colored"></i><strong>Описание: </strong>{{ $article->announce }}</p>
                        @endif
                        <div class="text-center"><a href="{{ $route }}" class="btn btn-theme-colored">Читать!</a></div>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                </article>
            </div>
        @endforeach
    </div>
</div>