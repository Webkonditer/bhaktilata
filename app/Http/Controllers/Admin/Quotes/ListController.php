<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Quotes;

use App\Http\Controllers\Controller;
use App\Domain\QuoteOfTheDay\QuoteRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ListController extends Controller
{
    public function index(QuoteRepository $repository)
    {
        $paging = $repository->page((int)LengthAwarePaginator::resolveCurrentPage())->setPath('/admin/quotes');

        return view('admin.quotes.list', [
            'quotes' => $paging->items(),
            'paging' => $paging,
        ]);
    }
}
