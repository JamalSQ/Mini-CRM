<x-layouts.app>
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Tasks</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom text-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">Edit Task</h2>
                    </div>
                    <div class="card-body p-3">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show small" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                            Please fix the following errors:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="needs-validation ajax-form" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title) }}" placeholder="Title" required>
                                        <label for="title">Title</label>
                                        @error('title')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $task->description) }}" placeholder="Description" required>
                                        <label for="description">Description</label>
                                        @error('description')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <select name="client_id" id="client_id" class="form-select @error('client_id') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select Client</option>
                                            @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ $task->client_id == $client->id ? 'selected' : '' }}>{{ $client->contact_name }} ({{ $client->company_name }})</option>
                                            @endforeach
                                        </select>
                                        <label for="client_id">Client</label>
                                        @error('client_id')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <select name="project_id" id="project_id" class="form-select @error('project_id') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select Project</option>
                                            @foreach($projects as $project)
                                            <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                                            @endforeach
                                        </select>
                                        <label for="project_id">Project</label>
                                        @error('project_id')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select User</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="user_id">Assigned User</label>
                                        @error('user_id')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="date" class="form-control form-control-sm @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ $task->deadline->format('Y-m-d') }}" placeholder="Deadline" required>
                                        <label for="deadline">Deadline</label>
                                        @error('deadline')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="status" id="status" class="form-control form-control-sm @error('status') is-invalid @enderror">
                                            @foreach($statuses as $status)
                                            <option value="{{$status->value}}" {{ $task->status?->value == $status->value ? 'selected' : '' }}>
                                                {{ $status->label() }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="status">Status</label>
                                        @error('status')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 gap-2">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Save Changes</button>
                                <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm px-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>