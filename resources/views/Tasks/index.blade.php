<x-layouts.app>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tasks</li>
                    </ol>
                </nav>
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">
                            Tasks
                        </h2>
                        <a href="{{route('tasks.create')}}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
                            <i class="fas fa-plus me-1"></i> Add Task
                        </a>
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
                            <table class="table table-sm table-hover align-middle mb-0">
                                <thead class="table-light small">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Client ID</th>
                                        <th>Project ID</th>
                                        <th>User ID</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <a href="#" class="btn btn-info btn-xs px-2 py-1" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-warning btn-xs px-2 py-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs px-2 py-1" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>