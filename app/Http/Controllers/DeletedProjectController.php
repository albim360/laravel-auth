<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\ProjectController;


class DeletedProjectController extends Controller
{
    public function index()
    {
        $deletedProjects = Project::onlyTrashed()->get();
        return view('deleted_projects.index')->with('deletedProjects', $deletedProjects);
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->find($id);
        $project->restore();
        return redirect()->route('deleted-projects.index')->with('success', 'Progetto ripristinato.');
    }

    public function forceDelete($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return redirect()->route('projects.deleted')->with('success', 'Progetto eliminato definitivamente.');
    }
    
    
    
    public function destroy($id)
{
    $project = Project::withTrashed()->find($id);
    $project->forceDelete();

    return redirect()->route('deleted-projects.index')->with('success', 'Project deleted permanently.');
}

}
