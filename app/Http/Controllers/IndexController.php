<?php

namespace App\Http\Controllers;

use App\Domain\QuoteOfTheDay\QuoteRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\CourseEventRepository;
use App\Repositories\NewsRepository;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param QuoteRepository       $quoteRepository
     * @param NewsRepository        $newsRepository
     * @param ArticlesRepository    $articlesRepository
     * @param CourseEventRepository $eventRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuoteRepository $quoteRepository, NewsRepository $newsRepository, ArticlesRepository $articlesRepository, CourseEventRepository $eventRepository)
    {
        return view('welcome', [
            'quote' => $quoteRepository->forToday(),
            'news' => $newsRepository->latest(5),
            'articles' => $articlesRepository->latest(2),
            'events' => $eventRepository->closest(),
        ]);
    }
}
