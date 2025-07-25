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
                        @can('create-task')
                        <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
                            <i class="fas fa-plus me-1"></i> Add Task
                        </a>
                        @endcan
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="tasks-table" class="table table-sm table-hover align-middle mb-0">
                                <thead class="table-light small">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Project</th>
                                        <th>User</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        @if(auth()->user()->can('edit-task') || auth()->user()->can('view-specific-task') || auth()->user()->can('delete-task'))
                                        <th class="text-center">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody id="tasks-table-body">
                                    @foreach($tasks as $index => $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->project->title ?? '' }}</td>
                                        <td>{{ $task->user->first_name ?? '' }} {{ $task->user->last_name ?? '' }}</td>
                                        <td>{{ $task->deadline->format('Y-m-d') }}</td>
                                        <td><span class="badge bg-{{$task->status->color()}}">{{ $task->status->label() }}</span></td>
                                        @if(auth()->user()->can('edit-task') || auth()->user()->can('view-specific-task') || auth()->user()->can('delete-task'))
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                @can('view-specific-task')
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-info px-2 py-1" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                @endcan
                                                @can('edit-task')
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @endcan
                                                @can('delete-task')
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="ajax-form d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" title="Delete" onclick="return confirm('Are you sure you want to delete this task?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                @endcan
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>