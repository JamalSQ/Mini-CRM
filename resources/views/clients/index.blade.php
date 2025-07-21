<x-layouts.app>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Breadcrumb navigation -->
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small bg-white px-2 py-2 rounded-2 shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2 px-3">
                        <h2 class="h5 mb-0 fw-bold text-primary">
                            Clients
                            <span class="badge bg-light text-primary ms-2" id="client-count">{{ count($clients) }}</span>
                        </h2>
                        <a href="{{ route('clients.create') }}" class="btn btn-outline-primary btn-sm fw-semibold px-3">
                            <i class="fas fa-plus me-1"></i> Add Client
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="clients-table" class="table table-sm table-hover align-middle mb-0">
                                <thead class="table-light small">
                                    <tr>
                                        <th scope="col" style="width: 5%;">#</th>
                                        <th scope="col" style="width: 20%;">Company</th>
                                        <th scope="col" style="width: 20%;">Contact Name</th>
                                        <th scope="col" style="width: 25%;">Email</th>
                                        <th scope="col" style="width: 15%;">Phone</th>
                                        <th scope="col" class="text-center" style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="clients-table-body">
                                    @forelse($clients as $index => $client)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $client->company_name }}</td>
                                        <td>{{ $client->contact_name }}</td>
                                        <td>{{ $client->contact_email }}</td>
                                        <td>{{ $client->contact_phone_number }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-xs px-2 py-1" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-xs px-2 py-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="ajax-form d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs px-2 py-1" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this client?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <p class="lead text-muted mb-0 small">No clients found. Start by adding a new one!</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{--
                        <div class="mt-3">
                            {{ $clients->links() }}
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layouts.app>