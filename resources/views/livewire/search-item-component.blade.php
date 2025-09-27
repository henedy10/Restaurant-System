<div>
    <!-- Search -->
    <div class="mb-3">
        <input type="text" wire:model.live="query" class="form-control placeholder-gold" placeholder="Search Items...">
    </div>

    <div>
        @if(session('successDeleteItem'))
            <div class="alert alert-success alert-dismissible fade show text-center rounded shadow-sm p-3 mt-2 w-50 mx-auto" role="alert">
                <strong>✔️ {{ session('successDeleteItem') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Chefs Table -->
    <table class="table table-dark table-striped">
        @if ($results->count() > 0)
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
        @endif

        <tbody>
            @forelse ( $results as $result )
                <tr>
                    <td>{{($results->firstItem() ?? 0) + $loop->index}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->type}}</td>
                    <td>{{$result->price}} $</td>
                    <td>
                        <a href="{{route('items.edit',$result->id)}}" class="btn btn-sm btn-gold">Edit</a>
                        <form action="{{route('items.destroy',$result->id)}}" method="POST" onsubmit="return confirmDelete();" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="{{route('items.show',$result->id)}}" class="btn btn-sm btn-primary">More Info</a>
                    </td>
                </tr>
            @empty
                <div class="container mt-4">
                    <div class="alert alert-warning d-flex align-items-center shadow-sm border-0" role="alert" style="background-color:#2c2c2c; color:#f8d7da;">
                        <i class="bi bi-exclamation-triangle-fill me-2" style="color:#dc3545; font-size:1.2rem;"></i>
                        <div>
                            There is no items !
                        </div>
                    </div>
                </div>
            @endforelse
        </tbody>
    </table>
        {{ $results->links('livewire::simple-bootstrap') }}
</div>
