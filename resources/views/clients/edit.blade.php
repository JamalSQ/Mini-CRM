<x-layouts.app>
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12"> <!-- Full width for consistency -->
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom text-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">Edit Client</h2>
                    </div>
                    <div class="card-body p-3"> <!-- Less padding for compactness -->
                        {{-- Success/Error Messages (if any) --}}
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show small" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                            Please fix the following errors:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="needs-validation ajax-form" novalidate>
                            @csrf
                            @method('PUT')

                            {{-- Contact Person Details Section --}}
                            <h6 class="mb-2 text-secondary fw-semibold">Contact Person Details</h6>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm @error('contact_name') is-invalid @enderror"
                                            id="contact_name"
                                            name="contact_name"
                                            value="{{ old('contact_name', $client->contact_name) }}"
                                            placeholder="Contact Name"
                                            required>
                                        <label for="contact_name">Contact Name</label>
                                        @error('contact_name')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input
                                            type="email"
                                            class="form-control form-control-sm @error('contact_email') is-invalid @enderror"
                                            id="contact_email"
                                            name="contact_email"
                                            value="{{ old('contact_email', $client->contact_email) }}"
                                            placeholder="Contact Email"
                                            required>
                                        <label for="contact_email">Contact Email</label>
                                        @error('contact_email')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input
                                            type="tel"
                                            class="form-control form-control-sm @error('contact_phone_number') is-invalid @enderror"
                                            id="contact_phone_number"
                                            name="contact_phone_number"
                                            value="{{ old('contact_phone_number', $client->contact_phone_number) }}"
                                            pattern="^\+?[0-9\s\-]{7,15}$"
                                            placeholder="+1234567890"
                                            required>
                                        <label for="contact_phone_number">Contact Phone Number</label>
                                        @error('contact_phone_number')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Company Details Section --}}
                            <h6 class="mb-2 text-secondary fw-semibold">Company Details</h6>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm @error('company_name') is-invalid @enderror"
                                            id="company_name"
                                            name="company_name"
                                            value="{{ old('company_name', $client->company_name) }}"
                                            placeholder="Company Name"
                                            required>
                                        <label for="company_name">Company Name</label>
                                        @error('company_name')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm @error('company_address') is-invalid @enderror"
                                            id="company_address"
                                            name="company_address"
                                            value="{{ old('company_address', $client->company_address) }}"
                                            placeholder="Company Address"
                                            required>
                                        <label for="company_address">Company Address</label>
                                        @error('company_address')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm @error('company_city') is-invalid @enderror"
                                            id="company_city"
                                            name="company_city"
                                            value="{{ old('company_city', $client->company_city) }}"
                                            placeholder="Company City"
                                            required>
                                        <label for="company_city">Company City</label>
                                        @error('company_city')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm @error('company_zip') is-invalid @enderror"
                                            id="company_zip"
                                            name="company_zip"
                                            value="{{ old('company_zip', $client->company_zip) }}"
                                            placeholder="Company ZIP"
                                            required>
                                        <label for="company_zip">Company ZIP</label>
                                        @error('company_zip')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm @error('company_vat') is-invalid @enderror"
                                            id="company_vat"
                                            name="company_vat"
                                            value="{{ old('company_vat', $client->company_vat) }}"
                                            placeholder="Company VAT"
                                            required>
                                        <label for="company_vat">Company VAT</label>
                                        @error('company_vat')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3 gap-2">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Save Changes</button>
                                <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm px-3">Cancel</a>
                            </div>
                        </form>
                    </div> <!-- End card-body -->
                </div> <!-- End card -->
            </div> <!-- End col -->
        </div> <!-- End row -->
    </div>
</x-layouts.app>