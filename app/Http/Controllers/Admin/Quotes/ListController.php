<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Quotes;

use App\Http\Controllers\Controller;
use App\Domain\QuoteOfTheDay\QuoteRepository;

class ListController extends Controller
{
    public function index(QuoteRepository $repository)
    {
        $quotes = $repository->all();

        return view('admin.quotes.list', [
            'quotes' => $quotes,
        ]);
    }
}
