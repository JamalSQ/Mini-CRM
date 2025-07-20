<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Utils\Reply;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdatedTaskRequest;
use App\Models\Project;
use App\Models\User;
use App\Enums\TaskStatus;
use App\Models\Client;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        $status = TaskStatus::cases();
        $clients = Client::all();

        return view('tasks.create', ['projects' => $projects, 'users' => $users, 'status' => $status, 'clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreTaskRequest $storeTaskRequest)
    {
        // $data = [
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'project_id' => $request->project_id,
        //     'user_id' => $request->user_id,
        //     'client_id' => $request->client_id,
        //     'status' => $request->status,
        //     'deadline' => $request->deadline,
        // ];

        try {
            Task::create($storeTaskRequest->validated());
            return Reply::success("Task created successfully", 200, route('tasks.index'));
        } catch (\Exception $e) {
            return Reply::error("Task created successfully", 200, $e->getMessage(), route('tasks.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task, UpdatedTaskRequest $updatedTaskRequest)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'project_id' => $request->projectId,
            'user_id' => $request->userId,
            'status' => $request->status,
        ];

        try {
            $task->update($data);
            return Reply::success("Task updated successfully", 200, route('tasks.index'));
        } catch (\Exception $e) {
            return Reply::error("Task updated successfully", 200, $e->getMessage(), route('tasks.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return Reply::success("Task deleted successfully", 200, route('tasks.index'));
        } catch (\Exception $e) {
            return Reply::error("Task deleted successfully", 200, $e->getMessage(), route('tasks.index'));
        }
    }
}
