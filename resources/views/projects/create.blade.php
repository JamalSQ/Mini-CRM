<x-layouts.app>
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom text-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">Add New Project</h2>
                    </div>
                    <div class="card-body p-3">
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
                        <form method="POST" action="{{route('projects.store')}}" class="needs-validation ajax-form" novalidate>
                            @csrf
                            <h6 class="mb-2 text-secondary fw-semibold">Project Details</h6>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" required>
                                        <label for="title">Title</label>
                                        @error('title')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" required>
                                        <label for="description">Description</label>
                                        @error('description')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="slectboxdesign">
                                        <select name="clientId" id="clientId" name="clientId" style="border:1px solid gray;" class="p-5 form-control form-control-sm form-select @error('clientId') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select Client</option>
                                            @foreach($clients as $client)
                                            <option
                                                value="{{ $client->id }}"
                                                data-contact-name="{{ $client->contact_name }}"
                                                data-company-name="{{ $client->company_name }}">
                                                {{ $client->contact_name }} ({{ $client->company_name }})
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('clientId')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @else
                                        <div class="invalid-feedback">Please select a client.</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <select name="userId" id="userId" name="userId" class="form-select @error('userId') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select User</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->fullName }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="userId">Assigned User</label>
                                        @error('userId')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @else
                                        <div class="invalid-feedback">Please select a user.</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="date" class="form-control form-control-sm @error('deadline') is-invalid @enderror" id="deadline" name="deadline" placeholder="Deadline" required>
                                        <label for="deadline">Deadline</label>
                                        @error('deadline')<div class="invalid-feedback small">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="form-floating">
                                        <select name="status" id="userId" class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select Status</option>
                                            @foreach($statuses as $status)
                                            <option value="{{ $status->name }}">
                                                {{ $status->value }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="userId">Assigned Status</label>
                                        @error('status')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @else
                                        <div class="invalid-feedback">Please select a status.</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 gap-2">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Add Project</button>
                                <a href="#" class="btn btn-secondary btn-sm px-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>