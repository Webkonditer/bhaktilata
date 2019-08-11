<?php

namespace App\Http\Controllers\Articles;

use App\Domain\Articles\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function article(Article $article)
    {
        return view('public.articles.article', [
            'article' => $article,
        ]);
    }
}