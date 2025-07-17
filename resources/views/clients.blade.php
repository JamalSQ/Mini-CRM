<x-layouts.app>
<div class="container py-5">
  <!-- Header with title and Add Client button -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Clients <span id="client-count" class="badge bg-secondary ms-2">0</span></h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
      <i class="fas fa-plus me-2"></i> Add Client
    </button>
  </div>

  <!-- Clients Table -->
  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody id="clients-table-body">
        <tr>
          <td colspan="5" class="text-center text-muted py-4">No clients added yet.</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="add-client-form" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Client Name -->
        <div class="mb-3">
          <label for="clientName" class="form-label">Name</label>
          <input type="text" class="form-control" id="clientName" required>
          <div class="invalid-feedback">
            Please enter client name.
          </div>
        </div>
        <!-- Email -->
        <div class="mb-3">
          <label for="clientEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="clientEmail" required>
          <div class="invalid-feedback">
            Please enter a valid email address.
          </div>
        </div>
        <!-- Phone -->
        <div class="mb-3">
          <label for="clientPhone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="clientPhone" required pattern="^\+?[0-9\s\-]{7,15}$" placeholder="+1234567890">
          <div class="invalid-feedback">
            Please enter a valid phone number.
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Client</button>
      </div>
    </form>
  </div>
</div>

<!-- Optional: View/Edit Client Modal (simplified, reusing Add form) -->
<div class="modal fade" id="viewEditClientModal" tabindex="-1" aria-labelledby="viewEditClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="edit-client-form" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="viewEditClientModalLabel">View/Edit Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Same fields as add -->
        <div class="mb-3">
          <label for="editClientName" class="form-label">Name</label>
          <input type="text" class="form-control" id="editClientName" required>
          <div class="invalid-feedback">
            Please enter client name.
          </div>
        </div>
        <div class="mb-3">
          <label for="editClientEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="editClientEmail" required>
          <div class="invalid-feedback">
            Please enter a valid email address.
          </div>
        </div>
        <div class="mb-3">
          <label for="editClientPhone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="editClientPhone" required pattern="^\+?[0-9\s\-]{7,15}$" placeholder="+1234567890">
          <div class="invalid-feedback">
            Please enter a valid phone number.
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="editClientId">
        <button type="button" class="btn btn-danger me-auto" id="delete-client-btn">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
  </div>
</div>
</x-layouts.app>