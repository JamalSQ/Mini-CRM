<x-layouts.app>
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Clients <span class="badge bg-secondary" id="client-count">0</span></h2>
    <a href="{{route('projects.create')}}" class="btn btn-primary">
      <i class="fas fa-plus me-2"></i> Add Client
    </a>
  </div>

  <div id="no-clients-msg" class="alert alert-info">No clients found.</div>

  <div class="table-responsive shadow-sm rounded d-none" id="clients-table-wrapper">
    <table class="table table-striped table-hover align-middle" id="clients-table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody id="clients-table-body">
        <!-- Client rows inserted here dynamically -->
      </tbody>
    </table>
  </div>
</div>
</x-layouts.app>