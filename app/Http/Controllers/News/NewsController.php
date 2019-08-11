<?php

namespace App\Http\Controllers\News;

use App\Domain\News\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function item(News $newsItem)
    {
        return view('public.news.news-item', [
            'newsItem' => $newsItem,
        ]);
    }
}