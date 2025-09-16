<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Chefs</title>
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

            <button type="button" class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addChefModal">
                Add Item
            </button>
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
            <!-- Static Example Rows -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>Head Chef</td>
                <td>10 years</td>
                <td>
                    <button class="btn btn-sm btn-gold">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                    <button class="btn btn-sm btn-primary">More Info</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>Assistant Chef</td>
                <td>5 years</td>
                <td>
                    <button class="btn btn-sm btn-gold">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                    <button class="btn btn-sm btn-primary">More Info</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Add Chef Modal -->
<div class="modal fade" id="addChefModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Chef</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" id="role" name="role" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label">Experience (years)</label>
                        <input type="number" id="experience" name="experience" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-gold">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
