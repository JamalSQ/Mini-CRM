<x-layouts.app>
  <div class="row justify-content-center m-5">
    <div class="col-12 col-md-12 col-lg-12">
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
      </nav>
      @if(session('success') || session('error'))
      <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast align-items-center text-white bg-{{ session('success') ? 'success' : 'danger' }} border-0 show" role="alert">
          <div class="d-flex">
            <div class="toast-body">
              {{ session('success') ?? session('error') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
      @endif
      <div class="card border-0 shadow-lg rounded-4 position-relative overflow-hidden" style="border-left: 6px solid #0d6efd;">
        <div class="row g-0">
          <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center bg-white py-4 px-3 border-end">
            <div class="bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="fa-solid fa-user fa-2x text-white"></i>
            </div>
            <h3 class="h5 fw-bold text-primary mb-1 text-center">{{ $user->fullName }}</h3>
            <div class="text-muted small text-center mb-2">User</div>
            <div class="d-flex flex-column gap-2 w-100 align-items-center">
              <a href="mailto:{{ $user->email }}" class="text-decoration-none small"><i class="fa-solid fa-envelope me-1"></i> {{ $user->email }}</a>
              <a href="tel:{{ $user->phone_number }}" class="text-decoration-none small"><i class="fa-solid fa-phone me-1"></i> {{ $user->phone_number }}</a>
            </div>
          </div>
          <div class="col-12 col-md-8 bg-light p-4">
            <div class="d-flex justify-content-end mb-2 gap-2">
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                <i class="fas fa-edit me-1"></i> Edit
              </a>
              <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm px-3 shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
              </a>
            </div>
            <div class="row g-3">
              <div class="col-12">
                <h6 class="fw-semibold text-secondary mb-2">User Information</h6>
              </div>
              <div class="col-12 col-md-6">
                <div class="bg-white rounded-3 p-3 h-100 shadow-sm">
                  <div class="mb-2 small text-muted">Address</div>
                  <div class="fw-semibold">{{ $user?->address }}</div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="bg-white rounded-3 p-3 h-100 shadow-sm">
                  <div class="mb-2 small text-muted">Terms Accepted At</div>
                  <div class="fw-semibold">{{ $user?->terms_accepted_at }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toastEl = document.querySelector('.toast');
      if (toastEl) {
        new bootstrap.Toast(toastEl).show();
      }
    });
  </script>
</x-layouts.app>