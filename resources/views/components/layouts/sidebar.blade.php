<div class="row">
  <div class="col-md-2 p-0">
    <div class="d-flex flex-column shadow-md flex-shrink-0 p-3 bg-light min-vh-100">
      <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
          <a href="{{ route('dashboard') }}"
            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'link-dark' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
          </a>
        </li>
        @can('view-users')
        <li>
          <a href="{{ route('users.index') }}"
            class="nav-link {{ request()->routeIs('users.*') ? 'active' : 'link-dark' }}">
            <i class="fas fa-users me-2"></i> Users
          </a>
        </li>
        @endcan
        @can('view-clients')
        <li>
          <a href="{{ route('clients.index') }}"
            class='nav-link {{ request()->routeIs("clients.*") ? "active" : "link-dark" }}'>
            <i class="fas fa-handshake me-2"></i> Clients
          </a>
        </li>
        @endcan
        @can('view-projects')
        <li>
          <a href="{{ route('projects.index') }}"
            class="nav-link {{ request()->routeIs('projects.*') ? 'active' : 'link-dark' }}">
            <i class="fas fa-folder-open me-2"></i> Projects
          </a>
        </li>
        @endcan
        @can('view-tasks')
        <li>
          <a href="{{ route('tasks.index') }}"
            class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : 'link-dark' }}">
            <i class="fas fa-tasks me-2"></i> Tasks
          </a>
        </li>
        @endcan
        @if(Auth()->user()->hasRole('superAdmin') && Auth()->user()->can('view-roles'))
        <li>
          <a href="{{ route('roles.index') }}"
            class="nav-link {{ request()->routeIs('roles.*') ? 'active' : 'link-dark' }}">
            <i class="bi bi-person-badge-fill me-2"></i> Roles
          </a>
        </li>
        @endif
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>{{Auth()->user()->first_name}}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
          @can('create-project')
          <li><a class="dropdown-item" href="{{ route('projects.create') }}">New project...</a></li>
          @endcan
          <li><a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>