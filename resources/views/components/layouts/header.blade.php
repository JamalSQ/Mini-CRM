<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2 px-4">
  <div class="container-fluid">
    <!-- Brand -->
    <a href="{{ route('home') }}" class="navbar-brand fw-bold text-primary fs-4">
      <i class="fas fa-gem me-2"></i>BrandName
    </a>



    <!-- Right Side: Auth/Welcome -->
    <div class="d-flex align-items-center ms-auto gap-2">
      @auth
      <span class="fw-semibold text-secondary me-2">
        @forelse (auth()->user()->getRoleNames() as $role)
        <span class="badge bg-primary me-1">{{ $role }}</span>
        @empty
        <span class="badge bg-secondary">No Role</span>
        @endforelse
        Welcome, <span class="text-primary">{{ Auth()->user()->fullName }}</span>
      </span>
      <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
      @else
      <a href="{{ route('login.form') }}" class="btn btn-outline-primary btn-sm">Login</a>
      <a href="{{ route('register.form') }}" class="btn btn-primary btn-sm ms-1">Sign Up</a>
      @endauth
    </div>
  </div>

  <div
    id="messageModal"
    class="message-modal position-fixed hide top-0 end-0 m-3 p-3 rounded text-white shadow-lg d-flex align-items-center justify-content-start"
    style="display:none !important; z-index:999;"
    role="alert">
    <div id="messageIcon" class="me-2">
    </div>
    <div id="messageText" class="flex-grow-1">
    </div>
  </div>
</header>