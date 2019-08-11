<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\View\Admin\News\NewsListTable;
use Illuminate\Pagination\LengthAwarePaginator;

class ListController extends Controller
{
    public function index(NewsRepository $repository)
    {
        return (new NewsListTable($repository->getPage(
            (int)LengthAwarePaginator::resolveCurrentPage(), NewsListTable::PER_PAGE
        )->setPath(route('admin.news.list'))))->render();
    }
}
