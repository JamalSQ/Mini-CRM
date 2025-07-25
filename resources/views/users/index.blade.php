<x-layouts.app>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-12">
        <nav aria-label="breadcrumb" class="mb-3">
          <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
          </ol>
        </nav>
        <div class="card border-0 shadow-sm rounded-3">
          <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2 px-3">
            <h2 class="h5 mb-0 fw-bold text-primary">
              Users
              <span class="badge bg-light text-primary ms-2" id="user-count">{{ count($users) }}</span>
            </h2>
            @if(auth()->user()->can('create-user') && auth()->user()->hasRole('superAdmin'))
            <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
              <i class="fas fa-plus me-1"></i> Add User
            </a>
            @endif
          </div>
          <div class="card-body p-3">
            <div class="table-responsive">
              <table id="users-table" class="table table-sm table-hover align-middle mb-0">
                <thead class="table-light small">
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    @if(auth()->user()->can('edit-user') && auth()->user()->can('view-specific-user') && auth()->user()->can('delete-user') && auth()->user()->can('create-user') && auth()->user()->hasRole('superAdmin'))
                    <th>Active</th>
                    <th>Role</th>
                    <th class="text-center">Actions</th>
                    @endif
                  </tr>
                </thead>
                <tbody id="users-table-body">
                  @foreach($users as $index => $user)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>

                    @if(auth()->user()->can('edit-user') && auth()->user()->can('view-specific-user') && auth()->user()->can('delete-user') && auth()->user()->can('create-user') && auth()->user()->hasRole('superAdmin'))
                    <td>{!! ($user->is_active)?'<span class="badge bg-success">active</span>':'<span class="badge bg-danger">not active</span>'; !!}</td>
                    <td>
                      @forelse ($user->getRoleNames() as $role)
                      <span class="badge bg-primary me-1">{{ $role }}</span>
                      @empty
                      <span class="badge bg-secondary">No Role</span>
                      @endforelse
                    </td>
                    <td class="text-center">
                      <div class="d-flex justify-content-center gap-1">
                        @can('view-specific-user')
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-info px-2 py-1" title="View">
                          <i class="fa-solid fa-eye"></i>
                        </a>
                        @endcan
                        @can('edit-user')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1" title="Edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        @endcan
                        @can('delete-user')
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="ajax-form d-inline delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" title="Delete">
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