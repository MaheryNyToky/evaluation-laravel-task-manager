<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->latest()->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = $request->user()->projects()->create($request->validated());

        return redirect()->route('projects.index')
            ->with('success', "Le projet '{$project->name}' a été créé avec succès.");
    }


    public function show(Project $project)
    {
        $this->checkAccess($project);

        $project->load('tasks.tags');

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->checkAccess($project);

        return view('projects.edit', compact('project'));
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        $this->checkAccess($project);

        $project->update($request->validated());

        return redirect()->route('projects.index')
            ->with('success', "Le projet '{$project->name}' a été mis à jour.");
    }

    public function destroy(Project $project)
    {
        $this->checkAccess($project);

        $projectName = $project->name;
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', "Le projet '{$projectName}' a été supprimé.");
    }

    private function checkAccess(Project $project): void
    {
        abort_if($project->user_id !== auth()->id(), 403, 'Accès non autorisé à ce projet.');
    }
}
