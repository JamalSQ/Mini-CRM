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
            <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
              <i class="fas fa-plus me-1"></i> Add User
            </a>
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
                    <th>Active</th>
                    <th>Role</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody id="users-table-body">
                  @forelse($users as $index => $user)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                   <td>{!! ($user->is_active)?'<span class="badge bg-success">active</span>':'<span class="badge bg-danger">not active</span>'; !!}</td>
                   <td>{!! ($user->role == 'user')?'<span class="badge bg-info">User</span>':'<span class="badge bg-success">Admin</span>'; !!}</td>
                    <td class="text-center">
                      <div class="d-flex justify-content-center gap-1">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-xs px-2 py-1" title="View">
                          <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-xs px-2 py-1" title="Edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="ajax-form d-inline delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-xs px-2 py-1" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="8" class="text-center py-4">
                      <p class="lead text-muted mb-0 small">No users found. Start by adding a new one!</p>
                      <a href="{{ route('users.create') }}" class="btn btn-success btn-sm mt-2">
                        <i class="fas fa-plus me-1"></i> Add Your First User
                      </a>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>