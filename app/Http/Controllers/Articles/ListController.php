<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Repositories\ArticlesRepository;

class ListController extends Controller
{
    public function index($page = 1, ArticlesRepository $repository)
    {
        $paginator = $repository->getPage($page, 15, true);
        $paginator->setRoute('articles');
        return view('public.articles.list', [
            'articles' => $paginator->items(),
            'paginator' => $paginator,
        ]);
    }
}