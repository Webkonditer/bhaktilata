<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Projects\Project;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add(ProjectRepository $repository)
    {
        $project = $repository->getDraft(\Auth::user());
        if (!$project) {
            $project = new Project();
            $project->status = 'draft';
            $project->title = '';
            $project->slug = '';
            $project->user_id = \Auth::user()->id;
            $repository->save($project);
        }
        return redirect()->route('admin.project.edit', ['project' => $project]);
    }

    public function edit(Project $project, ProjectCategoryRepository $repository)
    {
        return view('admin.projects.edit', [
            'categories' => $repository->all(),
            'project' => $project,
        ]);
    }

    public function store(Project $project, Request $request, ProjectRepository $repository)
    {
        $fields = $request->get('edit');
        $project->fill($request->get('edit'));
        $project->status = !empty($fields['published']) ? 'published' : 'unpublished';
        $project->user_id = \Auth::user()->id;
        $repository->save($project);
        return redirect()->route('admin.projects.list');
    }

    public function delete(Project $project, ProjectRepository $repository)
    {
        $project->user_id = \Auth::user()->id;
        $repository->remove($project);

        return redirect()->route('admin.projects.list');
    }
}
