<x-layouts.app>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </nav>
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">
                            Projects
                            <span class="badge bg-light text-primary ms-2" id="project-count">{{ count($projects) }}</span>
                        </h2>
                        @can('create-project')
                        <a href="{{route('projects.create')}}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
                            <i class="fas fa-plus me-1"></i> Add Project
                        </a>
                        @endcan
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
                        <div class="table-responsive">
                            <table class="table table-sm table-hover align-middle mb-0" id="Project-table">
                                <thead class="table-light small">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Client</th>
                                        <th>Project</th>
                                        <th>User</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        @if(auth()->user()->can('edit-project') || auth()->user()->can('view-specific-project') || auth()->user()->can('delete-project'))
                                        <th class="text-center">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$project->title}}</td>
                                        <td>{{$project?->client?->contact_name}}</td>
                                        <td>{{$project->title}}</td>
                                        <td>{{$project?->user?->fullName}}</td>
                                        <td>{{$project->deadline->format('Y-m-d')}}</td>
                                        <td><span class="badge bg-{{$project->status->color()}}">{{$project->status->label()}}</span></td>
                                        @if(auth()->user()->can('edit-project') || auth()->user()->can('view-specific-project') || auth()->user()->can('delete-project'))
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                @can('view-specific-project')
                                                <a href="{{route('projects.show',$project->id)}}" class="btn btn-sm btn-outline-info px-2 py-1" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                @endcan
                                                @can('edit-project')
                                                <a href="{{route('projects.edit',$project->id)}}" class="btn btn-sm btn-outline-warning px-2 py-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @endcan
                                                @can('delete-project')
                                                <form method="POST" action="{{route('projects.destroy',$project->id)}}" class="d-inline delete-form ajax-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this project?');">
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