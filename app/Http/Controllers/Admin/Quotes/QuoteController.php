<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Quotes;

use App\Domain\QuoteOfTheDay\Quote;
use App\Domain\QuoteOfTheDay\QuoteRepository;
use App\Pages\Page;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function add(QuoteRepository $repository)
    {
        $user = \Auth::user();
        $quote = $repository->getDraft($user);
        if (!$quote) {
            $quote = $repository->makeNew();
            $quote->setUser($user);
            $repository->save($quote);
        }
        return redirect()->route('admin.quote.edit', ['page' => $quote]);
    }

    public function edit(Quote $quote)
    {
        return view('admin.quotes.edit', [
            'quote' => $quote,
        ]);
    }

    public function store(Quote $quote, QuoteRepository $repository, Request $request)
    {
        $data = $request->get('edit');
        $quote->fill($data);
        $quote->setPublishStatus(isset($data['published']));
        $quote->setUser(\Auth::user());
        $repository->save($quote);
        return redirect()->route('admin.quote.edit', ['quote' => $quote]);
    }

    public function delete(Quote $quote, QuoteRepository $repository)
    {
        $quote->setUser(\Auth::user());
        $repository->remove($quote);

        return redirect()->route('admin.quotes.list');
    }
}
