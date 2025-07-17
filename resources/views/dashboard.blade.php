<x-layouts.app>
  <h1 class="mb-4">Dashboard Page</h1>
  <div class="container">
    <div class="row g-3">
      <!-- Card 1: Users -->
      <div class="col-12 col-md-3">
        <div class="card text-white bg-primary h-100">
          <div class="card-body d-flex align-items-center">
            <i class="fas fa-users fa-2x me-3"></i>
            <div>
              <h5 class="card-title">Users</h5>
              <h3 class="card-text">1,234</h3>
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
              <h3 class="card-text">567</h3>
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
              <h3 class="card-text">89</h3>
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
              <h3 class="card-text">230</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>