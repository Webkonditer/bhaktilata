<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Repositories\ArticlesRepository;
use App\View\Admin\Articles\ArticlesListTable;
use Illuminate\Pagination\LengthAwarePaginator;

class ListController extends Controller
{
    public function index(ArticlesRepository $repository)
    {
        return (new ArticlesListTable($repository->getPage(
            (int)LengthAwarePaginator::resolveCurrentPage(), ArticlesListTable::PER_PAGE
        )->setPath(route('admin.news.list'))))->render();
    }
}
