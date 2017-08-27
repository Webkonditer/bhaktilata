<?php

namespace App\Http\Controllers;

use App\Domain\QuoteOfTheDay\QuoteRepository;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param QuoteRepository $quoteRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuoteRepository $quoteRepository)
    {
        return view('welcome', [
            'quote' => $quoteRepository->forToday(),
        ]);
    }
}
