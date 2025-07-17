<x-layouts.app>
<div class="container py-5">
  <h2 class="mb-4">Client Details</h2>

  <div class="card shadow-sm" style="max-width: 600px;">
    <div class="card-body">
      <h5 class="card-title">{{ $client->name }}</h5>
      <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
      <p class="card-text"><strong>Phone:</strong> {{ $client->phone }}</p>
      <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary me-2">
        <i class="fas fa-edit me-1"></i> Edit
      </a>
      <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back to list</a>
    </div>
  </div>
</div>
</x-layouts.app>
