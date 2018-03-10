<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Repositories\CourseEventRepository;
use App\View\Admin\Courses\EventsListTable;
use Illuminate\Pagination\LengthAwarePaginator;

class EventsListController extends Controller
{
    public function index(CourseEventRepository $repository)
    {
        return (new EventsListTable($repository->getPage(
            (int)LengthAwarePaginator::resolveCurrentPage(), EventsListTable::PER_PAGE
        )->setPath(route('admin.news.list'))))->render();
    }
}
