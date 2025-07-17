<div class="row">
  <div class="col-md-3">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{Route('dashboard')}}" class="nav-link active" aria-current="page">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="{{Route('users.index')}}" class="nav-link link-dark">
            <i class="fas fa-users me-2"></i>
            Users
          </a>
        </li>
        <li>
          <a href="{{Route('clients.index')}}" class="nav-link link-dark">
            <i class="fas fa-handshake me-2"></i>
            Clients
          </a>
        </li>
        <li>
          <a href="{{Route('projects.index')}}" class="nav-link link-dark">
            <i class="fas fa-folder-open me-2"></i>
            Projects
          </a>
        </li>
        <li>
          <a href="{{Route('tasks.index')}}" class="nav-link link-dark">
            <i class="fas fa-tasks me-2"></i>
            Tasks
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>