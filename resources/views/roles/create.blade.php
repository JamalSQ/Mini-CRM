<x-layouts.app>
    <div class="container mt-4">
         <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fs-3 fw-bold text-primary">
                <i class="bi bi-person-badge-fill me-2"></i>Create New Role
            </h2>
            <a href="{{route('roles.index')}}" class="btn btn-outline-secondary btn-lg">
                <i class="bi bi-arrow-left-circle me-2"></i>Back to Roles
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{route('roles.store')}}" method="POST" class="ajax-form">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label fs-5 fw-bold">Role Name</label>
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            id="name"
                            name="name"
                            value=""
                            placeholder="e.g., administrator, editor"
                            required />
                    </div>
                    <div class="mb-4 ms-4">
                        <h5 class="fs-5 fw-bold mb-3">Assign Permissions</h5>
                        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3">
                            @foreach($permissions as $permission)
                            <div class="col">
                                    <div
                                        class="form-check form-check-inline form-switch p-3 border rounded shadow-sm h-100">
                                        <input
                                            class="form-check-input mt-0 fs-6"
                                            type="checkbox"
                                            id="{{$permission->id}}"
                                            name="permissions[]"
                                            value="{{ $permission->name }}"
                                            />
                                        <label
                                        class="form-check-label ms-2 fs-7 text-dark"
                                        for="permission_1">{{$permission->name}}</label>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button type="submit" class="btn btn-success btn-lg px-4 me-md-2">
                            <i class="bi bi-save me-2"></i>Save Role
                        </button>
                        <button
                            type="reset"
                            class="btn btn-outline-secondary btn-lg px-4">
                            <i class="bi bi-x-circle me-2"></i>Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>