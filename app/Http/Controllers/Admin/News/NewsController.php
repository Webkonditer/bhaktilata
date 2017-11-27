<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\News;

use App\Domain\News\News;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function add(NewsRepository $repository)
    {
        $user = \Auth::user();
        $newsItem = $repository->getDraft($user);
        if (!$newsItem) {
            $newsItem = $repository->makeNew();
            $newsItem->setUser($user);
            $repository->save($newsItem);
        }
        return redirect()->route('admin.news.edit', ['news' => $newsItem]);
    }

    public function edit(News $newsItem)
    {
        return view('admin.news.edit', [
            'newsItem' => $newsItem,
        ]);
    }

    public function store(News $newsItem, NewsRepository $repository, Request $request)
    {
        $data = $request->get('edit');
        $newsItem->fill($data);
        $newsItem->setPublishStatus(isset($data['published']));
        $newsItem->setUser(\Auth::user());
        $repository->save($newsItem);
        return redirect()->route('admin.news.list');
    }

    public function delete(News $newsItem, NewsRepository $repository)
    {
        $newsItem->setUser(\Auth::user());
        $repository->remove($newsItem);

        return redirect()->route('admin.news.list');
    }
}
