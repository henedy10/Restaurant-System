<div>
    <!-- Search -->
    <div class="mb-3">
        <input type="text" wire:model="query" wire:keyup="searchQuery" class="form-control placeholder-gold" placeholder="Search Chefs...">
    </div>

    <!-- Chefs Table -->
    <table class="table table-dark table-striped">
        @if ($results->count() > 0)
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
        @endif

        <tbody>
            @forelse ( $results as $result )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->role}}</td>
                    <td>
                        <a href="{{route('chefs.edit',$result->id)}}" class="btn btn-sm btn-gold">Edit</a>
                        <button class="btn btn-sm btn-danger">Delete</button>
                        <a href="{{route('chefs.show',$result->id)}}" class="btn btn-sm btn-primary">More Info</a>
                    </td>
                </tr>
            @empty
                <div class="container mt-4">
                    <div class="alert alert-warning d-flex align-items-center shadow-sm border-0" role="alert" style="background-color:#2c2c2c; color:#f8d7da;">
                        <i class="bi bi-exclamation-triangle-fill me-2" style="color:#dc3545; font-size:1.2rem;"></i>
                        <div>
                            There is no chef matching!
                        </div>
                    </div>
                </div>
            @endforelse
        </tbody>
    </table>
</div>

