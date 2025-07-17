<x-layouts.app>
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Clients <span class="badge bg-secondary" id="client-count">{{ count($clients) }}</span></h2>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">
      <i class="fas fa-plus me-2"></i> Add Client
    </a>
  </div>

  <div class="table-responsive shadow-sm rounded" id="clients-table-wrapper">
    <table class="table table-striped table-hover align-middle" id="clients-table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Contact Name</th>
          <th>Contact Email</th>
          <th>Contact Phone</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody id="clients-table-body">
        @forelse($clients as $index => $client)
        <tr>
          <td>{{ $loop->index+1 }}</td>
          <td>{{ $client->contact_name }}</td>
          <td>{{ $client->contact_email }}</td>
          <td>{{ $client->contact_phone_number }}</td>
          <td class="text-center">
            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-info">View</a>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <!-- Delete form or button could go here -->
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">No records found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</x-layouts.app>
