<x-layouts.app>
    <div class="container mt-4">
         <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">View</li>
            </ol>
        </nav>
        <div class="card shadow-sm mb-4 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0 fs-4 fw-bold text-primary">
                    <i class="bi bi-info-circle-fill me-2"></i>Role Details
                </h2>
                <a href="{{route('roles.index')}}" class="btn btn-outline-secondary btn-md">
                    <i class="bi bi-arrow-left-circle me-2"></i>Back to Roles
                </a>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-secondary">Role Name:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge bg-primary fs-5 p-2">{{$role->name}}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-secondary">Guard Name:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge bg-info-subtle text-info fs-6 p-2">{{$role->guard_name}}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-secondary">Created At:</strong>
                    </div>
                    <div class="col-md-9">
                        <p class="mb-0">{{$role->created_at}}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-secondary">Last Updated:</strong>
                    </div>
                    <div class="col-md-9">
                        <p class="mb-0">{{$role->updated_at}}</p>
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="fs-5 fw-bold mb-3 text-primary">
                    <i class="bi bi-key-fill me-2"></i>Assigned Permissions
                </h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($role->permissions as $permission)
                    <span class="badge bg-success-subtle text-success fs-6 p-2">
                        <i class="bi bi-check-circle me-1"></i>{{$permission->name}}
                    </span>
                    @endforeach
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning btn-md px-4">
                        <i class="bi bi-pencil me-2"></i>Edit Role
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteRoleModalShow" tabindex="-1" aria-labelledby="deleteRoleModalLabelShow" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteRoleModalLabelShow">Confirm Deletion</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete the role "<strong>editor</strong>"? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>