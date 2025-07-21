<x-layouts.app>
  <nav aria-label="breadcrumb" class="p-3">
    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ol>
  </nav>
  <div class="container">
    <div class="row g-3">
      <!-- Card 1: Users -->
      <div class="col-12 col-md-3">
        <div class="card text-white bg-primary h-100">
          <div class="card-body d-flex align-items-center">
            <i class="fas fa-users fa-2x me-3"></i>
            <div>
              <h5 class="card-title">Users</h5>
              <h3 class="card-text">{{$users}}</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 2: Clients -->
      <div class="col-12 col-md-3">
        <div class="card text-white bg-success h-100">
          <div class="card-body d-flex align-items-center">
            <i class="fas fa-handshake fa-2x me-3"></i>
            <div>
              <h5 class="card-title">Clients</h5>
              <h3 class="card-text">{{$clients}}</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 3: Projects -->
      <div class="col-12 col-md-3">
        <div class="card text-white bg-warning h-100">
          <div class="card-body d-flex align-items-center">
            <i class="fas fa-folder-open fa-2x me-3"></i>
            <div>
              <h5 class="card-title">Projects</h5>
              <h3 class="card-text">{{$projects}}</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 4: Clients (again) -->
      <div class="col-12 col-md-3">
        <div class="card text-white bg-danger h-100">
          <div class="card-body d-flex align-items-center">
            <i class="fas fa-user-tie fa-2x me-3"></i>
            <div>
              <h5 class="card-title">Clients</h5>
              <h3 class="card-text">{{$clients}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>