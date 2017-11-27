<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ListController extends Controller
{
    public function index(NewsRepository $repository)
    {
        $paging = $repository->getPage((int)LengthAwarePaginator::resolveCurrentPage())->setPath('/admin/news');

        return view('admin.news.list', [
            'news' => $paging->items(),
            'paging' => $paging,
        ]);
    }
}
