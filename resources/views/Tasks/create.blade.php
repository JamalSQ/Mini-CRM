<x-layouts.app>
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Tasks</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom text-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">Add New Task</h2>
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
                        <form method="POST" class="needs-validation ajax-form" novalidate>
                            @csrf
                            <h6 class="mb-2 text-secondary fw-semibold">Task Details</h6>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" required>
                                        <label for="title">Title</label>
                                        @error('title')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" required>
                                        <label for="description">Description</label>
                                        @error('description')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('clientId') is-invalid @enderror" id="clientId" name="clientId" placeholder="Client ID" required>
                                        <label for="clientId">Client ID</label>
                                        @error('clientId')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('projectId') is-invalid @enderror" id="projectId" name="projectId" placeholder="Project ID" required>
                                        <label for="projectId">Project ID</label>
                                        @error('projectId')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('userId') is-invalid @enderror" id="userId" name="userId" placeholder="User ID" required>
                                        <label for="userId">User ID</label>
                                        @error('userId')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('deadline') is-invalid @enderror" id="deadline" name="deadline" placeholder="Deadline" required>
                                        <label for="deadline">Deadline</label>
                                        @error('deadline')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('status') is-invalid @enderror" id="status" name="status" placeholder="Status" required>
                                        <label for="status">Status</label>
                                        @error('status')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 gap-2">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Add Task</button>
                                <a href="#" class="btn btn-secondary btn-sm px-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>