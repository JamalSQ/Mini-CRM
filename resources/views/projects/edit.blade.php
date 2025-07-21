<x-layouts.app>
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom text-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">Edit Project</h2>
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
                        <form method="POST" action="{{route('projects.update', $project->id)}}" class="ajax-form needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <h6 class="mb-2 text-secondary fw-semibold">Project Details</h6>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" value="{{$project->title}}" id="title" name="title" placeholder="Title" required>
                                        <label for="title">Title</label>
                                        @error('title')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" value="{{$project->description}}" id="description" name="description" placeholder="Description" required>
                                        <label for="description">Description</label>
                                        @error('description')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <select name="client_id" id="clientId" class="form-control form-control-sm @error('clientId') is-invalid @enderror">
                                            @forelse($clients as $singleClient)
                                            <option value="{{$singleClient->id}}" {{ ($project->client->id == $singleClient->id)?'selected':''}}>{{$singleClient->contact_name}}</option>
                                            @empty
                                            <p class="text-muted">No Clients Found</p>
                                            @endforelse
                                        </select>
                                        <label for="clientId">Client</label>
                                        @error('clientId')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <!-- <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <select name="project_id" id="projectId" class="form-control form-control-sm @error('projectId') is-invalid @enderror">
                                            @forelse($projects as $singleProject)
                                            <option value="{{$singleProject->id}}" {{ ($project->id == $singleProject->id)?'selected':''}}>{{$singleProject->title}}</option>
                                            @empty
                                            <p class="text-muted">No Project Found</p>
                                            @endforelse
                                        </select>
                                        <label for="projectId">Project</label>
                                        @error('projectId')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select name="user_id" id="userId" class="form-control form-control-sm @error('userId') is-invalid @enderror">
                                            @forelse($users as $singleUser)
                                            <option value="{{$singleUser->id}}" {{ ($project->user?->id == $singleUser->id)?'selected':''}}>{{$singleUser->fullName}}</option>
                                            @empty
                                            <p class="text-muted">No User Found</p>
                                            @endforelse
                                        </select>
                                        <label for="userId">User</label>
                                        @error('userId')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select name="status" id="status" class="form-control form-control-sm @error('status') is-invalid @enderror">
                                            @foreach($statuses as $status)
                                            <option value="{{$status->value}}" {{ $project->status->name == $status->name ? 'selected' : '' }}>
                                                {{ $status->label() }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="status">Status</label>
                                        @error('status')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="date" class="form-control form-control-sm @error('deadline') is-invalid @enderror" value="{{$project->deadline->format('Y-m-d')}}" id="deadline" name="deadline" placeholder="Deadline" required>
                                        <label for="deadline">Deadline</label>
                                        @error('deadline')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 gap-2">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Save Changes</button>
                                <a href="{{route('projects.index')}}" class="btn btn-secondary btn-sm px-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>