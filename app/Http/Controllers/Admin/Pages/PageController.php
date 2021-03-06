<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Pages;

use App\Pages\Page;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function add(PageRepository $repository)
    {
        $user = \Auth::user();
        $page = $repository->getDraft($user);
        if (!$page) {
            $page = $repository->makeNew();
            $page->setUser($user);
            $repository->save($page);
        }
        return redirect()->route('admin.page.edit', ['page' => $page]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    public function store(Page $page, PageRepository $repository, Request $request)
    {
        $data = $request->get('edit');
        $page->fill($data);
        $page->setPublishStatus(isset($data['published']));
        $page->setUser(\Auth::user());
        $repository->save($page);
        return redirect()->route('admin.page.edit', ['page' => $page]);
    }

    public function delete(Page $page, PageRepository $repository)
    {
        $page->setUser(\Auth::user());
        $repository->remove($page);

        return redirect()->route('admin.pages.list');
    }
}
