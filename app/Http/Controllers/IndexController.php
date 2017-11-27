<?php

namespace App\Http\Controllers;

use App\Domain\QuoteOfTheDay\QuoteRepository;
use App\Repositories\NewsRepository;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param QuoteRepository $quoteRepository
     * @param NewsRepository  $newsRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuoteRepository $quoteRepository, NewsRepository $newsRepository)
    {
        return view('welcome', [
            'quote' => $quoteRepository->forToday(),
            'news' => $newsRepository->latest(5),
        ]);
    }
}
