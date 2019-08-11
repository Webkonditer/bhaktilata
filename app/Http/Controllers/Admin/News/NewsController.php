<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\News;

use App\Domain\News\News;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\View\Admin\News\NewsEditForm;
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
        $form = new NewsEditForm();
        $form->fill($newsItem);
        return $form->render();
    }

    public function store(News $newsItem, NewsRepository $repository, Request $request)
    {
        $form = new NewsEditForm();
        $rules = $form->getRules();
        $v = \Validator::make($request->all(), $rules);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        $form->process($request);
        $data = $form->values();
        $filesFields = ['small_image', 'medium_image', 'full_image'];
        $files = [];
        foreach ($filesFields as $fileFieldCode) {
            $files[$fileFieldCode] = $data[$fileFieldCode];
            unset($data[$fileFieldCode]);
        }
        $newsItem->fill($data);
        foreach ($filesFields as $fileFieldCode) {
            if ($files[$fileFieldCode]) {
                $newsItem->{$fileFieldCode} = $files[$fileFieldCode]->storeAs(
                    'i/news/' . $newsItem->id,
                    $files[$fileFieldCode]->getClientOriginalName(),
                    'public'
                );
            }
        }
        $newsItem->setPublishStatus($data['published']);
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
