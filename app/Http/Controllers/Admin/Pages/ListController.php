<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;

class ListController extends Controller
{
    public function index(PageRepository $repository)
    {
        $pages = $repository->all();

        return view('admin.pages.list', [
            'pages' => $pages,
        ]);
    }
}
