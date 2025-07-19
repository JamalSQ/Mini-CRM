<x-layouts.app>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Tasks</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
                @if(session('success'))
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
                <div class="card border-0 shadow-sm rounded-3 mx-auto" style="max-width: 600px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-grow-1">
                                <h2 class="h5 mb-1 fw-bold text-primary">Task Title</h2>
                                <p class="text-muted mb-0 small">Task Information Overview</p>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline-primary btn-sm me-1 px-3">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm px-3">
                                    <i class="fas fa-arrow-left me-1"></i> Back
                                </a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <p class="mb-2 small"><strong>Title:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 small"><strong>Description:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 small"><strong>Client ID:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 small"><strong>Project ID:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 small"><strong>User ID:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 small"><strong>Deadline:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 small"><strong>Status:</strong><br><span class="text-muted">&nbsp;</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>