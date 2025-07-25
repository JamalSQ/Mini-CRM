<x-layouts.app>
  <div class="container pt-2">
    <div class="row justify-content-center">
      <div class="col-12 col-md-12 col-lg-12">
        <nav aria-label="breadcrumb" class="mb-3">
          <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
          </ol>
        </nav>
        <div class="card shadow-sm border-0 rounded-3">
          <div class="card-header bg-white border-bottom text-center py-2 px-3">
            <h2 class="h5 mb-0 fw-bold text-primary">Add New User</h2>
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
            <form action="{{ route('users.store') }}" method="POST" class="needs-validation ajax-form" novalidate>
              @csrf
              <div class="row mb-2">
                <div class="col-md-6 mb-2 mb-md-0">
                  <div class="form-floating">
                    <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                    <label for="first_name">First Name</label>
                    @error('first_name')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                    <label for="last_name">Last Name</label>
                    @error('last_name')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-6 mb-2 mb-md-0">
                  <div class="form-floating">
                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    <label for="email">Email</label>
                    @error('email')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-6 mb-2 mb-md-0">
                  <div class="form-floating">
                    <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Address">
                    <label for="address">Address</label>
                    @error('address')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="tel" class="form-control form-control-sm @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number">
                    <label for="phone_number">Phone Number</label>
                    @error('phone_number')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="form-floating">
                    <select name="role[]" id="role" multiple class="form-select @error('role') is-invalid @enderror">
                     @foreach($roles as $role)
                      <option value="{{$role->name}}">{{$role->name}}</option>
                      @endforeach
                    </select>
                    @error('role')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                  </div>
                </div>
                <div class="col-md-3 mt-4">
                  <label for="is_active" class="mx-3">Is Active</label>
                  {{-- Hidden input to ensure a value is always sent for 'is_active' --}}
                  <input type="hidden" name="is_active" value="0">
                  <input type="checkbox" name="is_active" id="is_active" value="1" class="@error('is_active') is-invalid @enderror">
                  @error('is_active')<div class="invalid-feedback small">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="d-flex justify-content-end mt-3 gap-2">
                <button type="submit" class="btn btn-primary btn-sm px-3">Add User</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm px-3">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>