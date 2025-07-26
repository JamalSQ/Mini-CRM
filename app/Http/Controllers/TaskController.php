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
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Policy is automatically checked by authorizeResource for 'viewAny'
        $loggedInUser = Auth::id(); 
        $tasks = Task::where('user_id',$loggedInUser)->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Task $task) // Note: $task here is a convention, policy handles it
    {
        // Policy is automatically checked by authorizeResource for 'create'
        $projects = Project::all();
        $users = User::where('is_active','1')->get();
        $status = TaskStatus::cases();
        $clients = Client::all();

        return view('tasks.create', ['projects' => $projects, 'users' => $users, 'status' => $status, 'clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreTaskRequest $storeTaskRequest)
    {
        // Policy is automatically checked by authorizeResource for 'create'
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
        // Policy is automatically checked by authorizeResource for 'view'
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // Policy is automatically checked by authorizeResource for 'update'
        $clients = Client::all();
        $users = User::where('is_active','1')->get();
        $projects = Project::all();
        $statuses = TaskStatus::cases();

        return view('tasks.edit', [
            'task' => $task,
            'clients' => $clients,
            'users' => $users,
            'projects' => $projects,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task, UpdatedTaskRequest $updatedTaskRequest)
    {
        // Policy is automatically checked by authorizeResource for 'update'
        try {
            $task->update($updatedTaskRequest->validated());
            return Reply::success("Task updated successfully", 200, route('tasks.index'));
        } catch (\Exception $e) {
            return Reply::error("Unable to update the task", 422, $e->getMessage(), route('tasks.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Policy is automatically checked by authorizeResource for 'delete'
        try {
            $task->delete();
            return Reply::success("Task deleted successfully", 200, route('tasks.index'));
        } catch (\Exception $e) {
            return Reply::error("Unable to delete task", 422, $e->getMessage());
        }
    }
}