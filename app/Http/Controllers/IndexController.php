<?php

namespace App\Http\Controllers;

use App\Domain\QuoteOfTheDay\QuoteRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\CourseEventRepository;
use App\Repositories\NewsRepository;
use App\Video;
use App\Schedule\Schedule;

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
        //dd(Video::orderBy('created_at', 'desc')->limit(2)->get());

        //dd(Schedule::orderBy('beginning_date', 'desc')->limit(2)->get());
        return view('welcome', [
                'quote' => $quoteRepository->forToday(),
                'news' => $newsRepository->latest(5),
                'articles' => $articlesRepository->latest(2),
                'events' => Schedule::orderBy('beginning_date')->limit(2)->get(),
                'videos' => Video::orderBy('created_at', 'desc')->limit(2)->get(),//Для последних видео
            ]);
    }
}
