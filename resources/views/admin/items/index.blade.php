<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #FFD700;
        }
        .table-dark th,
        .table-dark td {
            color: #FFD700;
        }
        .btn-gold {
            background-color: #FFD700;
            color: #000;
        }
        .btn-gold:hover {
            background-color: #e6c200;
            color: #000;
        }
        .modal-content {
            background-color: #111;
            color: #FFD700;
        }
        .form-control,
        .form-select {
            background-color: #222;
            color: #FFD700;
            border: 1px solid #FFD700;
        }
        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 5px #FFD700;
            border-color: #FFD700;
        }
        .placeholder-gold::placeholder {
            color: #FFD700;   /* دهبـي */
            opacity: 1;       /* عشان مايبقاش باهت */
        }
    </style>
</head>

<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Items</h2>
        <!-- Button trigger modal -->
        <div class="d-flex align-items-center gap-3 mb-3">
            <a href="{{route('home')}}" class="nav-link">Home</a>

            <a href="{{route('items.create')}}" class="btn btn-gold" >
                Add Item
            </a>
        </div>
    </div>

    <!-- Search -->
    <div class="mb-3">
        <input type="text" class="form-control placeholder-gold" placeholder="Search Items...">
    </div>

    <!-- Chefs Table -->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $items as $item )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->price}} $</td>
                    <td>
                        <a href="{{route('items.edit',$item->id)}}" class="btn btn-sm btn-gold">Edit</a>
                        <button class="btn btn-sm btn-danger">Delete</button>
                        <a href="{{route('items.show',$item->id)}}" class="btn btn-sm btn-primary">More Info</a>
                    </td>
                </tr>
            @empty
                <div class="container mt-4">
                    <div class="alert alert-warning d-flex align-items-center shadow-sm border-0" role="alert" style="background-color:#2c2c2c; color:#f8d7da;">
                        <i class="bi bi-exclamation-triangle-fill me-2" style="color:#dc3545; font-size:1.2rem;"></i>
                        <div>
                            There is no Items!
                        </div>
                    </div>
                </div>
            @endforelse
        </tbody>
    </table>
    {{-- Pagination --}}
    {{ $items->links('vendor.pagination.bootstrap-4') }}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
