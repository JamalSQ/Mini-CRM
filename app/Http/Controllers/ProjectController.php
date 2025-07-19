<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Utils\Reply;
use App\Models\Client;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user', 'client'])->get();
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $Users =  User::all();
        $status = ProjectStatus::cases();

        return view('projects.create', ['clients' => $clients, 'users' => $Users, 'statuses' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'client_id' => $request->clientId,
            'user_id' => $request->userId,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ];

        // dd($data);

        try {
            Project::create($data);
            Reply::success("Project created successfully", 200, route('project.index'));
        } catch (\Exception $e) {
            Reply::success("Project created successfully", 200, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $client)
    {
        return view('projects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        return "project updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        return "project deleted successfully";
    }
}
