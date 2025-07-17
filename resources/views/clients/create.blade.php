<x-layouts.app>
<div class="container py-5">
    <h2 class="mb-4">Add New Client</h2>

    <form action="{{ Route('clients.store') }}" method="POST" class="needs-validation ajax-form" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input
                type="text"
                class="form-control @error('company_name') is-invalid @enderror"
                id="company_name"
                name="company_name"
                value="{{ old('company_name') }}"
                required>
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The company name field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_address" class="form-label">Company Address</label>
            <input
                type="text"
                class="form-control @error('company_address') is-invalid @enderror"
                id="company_address"
                name="company_address"
                value="{{ old('company_address') }}"
                required>
            @error('company_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The company address field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_city" class="form-label">Company City</label>
            <input
                type="text"
                class="form-control @error('company_city') is-invalid @enderror"
                id="company_city"
                name="company_city"
                value="{{ old('company_city') }}"
                required>
            @error('company_city')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The company city field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_zip" class="form-label">Company ZIP</label>
            <input
                type="text"
                class="form-control @error('companyu_zip') is-invalid @enderror"
                id="company_zip"
                name="company_zip"
                value="{{ old('company_zip') }}"
                required>
            @error('companyu_zip')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The companyu zip field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_vat" class="form-label">Company VAT</label>
            <input
                type="text"
                class="form-control @error('company_vat') is-invalid @enderror"
                id="company_vat"
                name="company_vat"
                value="{{ old('company_vat') }}"
                required>
            @error('company_vat')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The company vat field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contact_name" class="form-label">Contact Name</label>
            <input
                type="text"
                class="form-control @error('contact_name') is-invalid @enderror"
                id="contact_name"
                name="contact_name"
                value="{{ old('contact_name') }}"
                required>
            @error('contact_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The contact name field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contact_email" class="form-label">Contact Email</label>
            <input
                type="email"
                class="form-control @error('contact_email') is-invalid @enderror"
                id="contact_email"
                name="contact_email"
                value="{{ old('contact_email') }}"
                required>
            @error('contact_email')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The contact email field is required.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contact_phone_number" class="form-label">Contact Phone Number</label>
            <input
                type="tel"
                class="form-control @error('contact_phone_number') is-invalid @enderror"
                id="contact_phone_number"
                name="contact_phone_number"
                value="{{ old('contact_phone_number') }}"
                pattern="^\+?[0-9\s\-]{7,15}$"
                placeholder="+1234567890"
                required>
            @error('contact_phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="invalid-feedback">The contact phone number field is required.</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-4">Add Client</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
</x-layouts.app>
