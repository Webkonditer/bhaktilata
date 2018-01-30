<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;

class ListController extends Controller
{
    public function index($page = 1, NewsRepository $repository)
    {
        $paginator = $repository->getPage($page, 15, true);
        $paginator->setRoute('news');
        return view('public.news.list', [
            'news' => $paginator->items(),
            'paginator' => $paginator,
        ]);
    }
}