<x-layouts.app>
<div class="container py-5">
  <h2 class="mb-4">Add New Client</h2>

  <form action="{{ route('clients.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        name="name"
        value="{{ old('name') }}"
        required>
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @else
        <div class="invalid-feedback">Please enter client name.</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input
        type="email"
        class="form-control @error('email') is-invalid @enderror"
        id="email"
        name="email"
        value="{{ old('email') }}"
        required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @else
        <div class="invalid-feedback">Please enter a valid email address.</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input
        type="tel"
        class="form-control @error('phone') is-invalid @enderror"
        id="phone"
        name="phone"
        value="{{ old('phone') }}"
        pattern="^\+?[0-9\s\-]{7,15}$"
        placeholder="+1234567890"
        required>
      @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
      @else
        <div class="invalid-feedback">Please enter a valid phone number.</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary px-4">Add Client</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>
</x-layouts.app>
