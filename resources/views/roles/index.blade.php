<x-layouts.app>
    <div class="container mt-4">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </nav>
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2 px-3">
                <h2 class="h5 mb-0 fw-bold text-primary">
                    <i class="bi bi-person-badge-fill me-2"></i>Manage Roles
                </h2>
                <a href="{{route('roles.create')}}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
                    <i class="fas fa-plus me-1"></i> Add New Role
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="roles-tables">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-secondary fw-bold">#</th>
                                    <th scope="col" class="text-secondary fw-bold">Role Name</th>
                                    <th scope="col" class="text-secondary fw-bold">Permissions</th>
                                    <th scope="col" class="text-secondary fw-bold text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>
                                        <span class="badge bg-secondary fs-6 p-2">{{$role->name}}</span>
                                    </td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                        <span class="badge bg-info-subtle text-info fw-normal">{{$permission->name}}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Role Actions">
                                            <a
                                                href="{{route('roles.show',$role->id)}}"
                                                class="btn btn-sm btn-outline-info"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="View Role">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a
                                                href="{{route('roles.edit',$role->id)}}"
                                                class="btn btn-sm btn-outline-warning"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Role">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{route('roles.destroy',$role->id)}}" method="POST" class="ajax-form">
                                                @csrf 
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete Role">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

</x-layouts.app>