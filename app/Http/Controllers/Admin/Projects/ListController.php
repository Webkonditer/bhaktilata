<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;

class ListController extends Controller
{
    public function index(ProjectRepository $repository)
    {
        $projects = $repository->all();

        return view('admin.projects.list', [
            'projects' => $projects,
        ]);
    }
}
