<x-layouts.app>
<div class="container py-5">

  {{-- Flash Message Toast --}}
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

  <h2 class="mb-4">Client Details</h2>

  <div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body">
      <h4 class="card-title mb-3 text-primary">{{ $client->contact_name }}</h4>

      <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item"><strong>Contact Email:</strong> {{ $client->contact_email }}</li>
        <li class="list-group-item"><strong>Contact Phone:</strong> {{ $client->contact_phone_number }}</li>
        <li class="list-group-item"><strong>Company Name:</strong> {{ $client->company_name }}</li>
        <li class="list-group-item"><strong>Company Address:</strong> {{ $client->company_address }}</li>
        <li class="list-group-item"><strong>City:</strong> {{ $client->company_city }}</li>
        <li class="list-group-item"><strong>ZIP:</strong> {{ $client->company_zip }}</li>
        <li class="list-group-item"><strong>VAT Number:</strong> {{ $client->company_vat }}</li>
      </ul>

      <div class="d-flex">
        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary me-2">
          <i class="fas fa-edit me-1"></i> Edit
        </a>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left me-1"></i> Back to list
        </a>
      </div>
    </div>
  </div>
</div>

{{-- Optional: Bootstrap Toast script (if not already globally included) --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toastEl = document.querySelector('.toast');
    if (toastEl) {
      new bootstrap.Toast(toastEl).show();
    }
  });
</script>
</x-layouts.app>
