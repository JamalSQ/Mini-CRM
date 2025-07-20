<x-layouts.app>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tasks</li>
                    </ol>
                </nav>
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">
                            Tasks
                            <span class="badge bg-light text-primary ms-2" id="task-count">{{ count($tasks) }}</span>
                        </h2>
                        <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
                            <i class="fas fa-plus me-1"></i> Add Task
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="tasks-table" class="table table-sm table-hover align-middle mb-0">
                                <thead class="table-light small">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Client</th>
                                        <th>Project</th>
                                        <th>User</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tasks-table-body">
                                    @forelse($tasks as $index => $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->client->contact_name ?? '' }}</td>
                                        <td>{{ $task->project->title ?? '' }}</td>
                                        <td>{{ $task->user->first_name ?? '' }} {{ $task->user->last_name ?? '' }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-xs px-2 py-1" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-xs px-2 py-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="ajax-form d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs px-2 py-1" title="Delete" onclick="return confirm('Are you sure you want to delete this task?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <p class="lead text-muted mb-0 small">No tasks found. Start by adding a new one!</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>