<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdatedProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Utils\Reply;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $this->authorize('viewAny',User::class);
        $projects = Project::with(['user', 'client'])->get();
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',User::class);
        $clients = Client::all();
        $Users =  User::where('is_active','1')->get();
        $status = ProjectStatus::cases();

        return view('projects.create', ['clients' => $clients, 'users' => $Users, 'statuses' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
          $this->authorize('create',User::class);
        try {
            Project::create($request->validated());
            return Reply::success("Project created successfully", 200, route('projects.index'));
        } catch (\Exception $e) {
            return Reply::error("unable to create Project", 422, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('specificView', $project);
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update',$project);
        $clients = Client::all();
        $users =  User::where('is_active','1')->get();
        $projects = Project::all();
        $status = ProjectStatus::cases();

        return view('projects.edit', ['project' => $project, 'clients' => $clients, 'users' => $users, 'projects' => $projects, 'statuses' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $requests, Project $project, UpdatedProjectRequest $request)
    {
        $this->authorize('update',$project);
        try {
            $project->update($request->validated());
            return Reply::success("Project updated successfully", 200, route('projects.index'));
        } catch (\Exception $e) {
            return Reply::success("Project updated successfully", 200, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete',$project);
        try {
            $project->delete();
            return Reply::success("Project deleted successfully", 200, route('projects.index'));
        } catch (\Exception $e) {
            return Reply::error("Project deleted successfully", 200, $e->getMessage(), route('projects.index'));
        }
    }
}
