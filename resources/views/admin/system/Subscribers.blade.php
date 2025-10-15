<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Subscribers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #FFD700;
            font-family: 'Poppins', sans-serif;
        }

        h3 {
            font-weight: 600;
            letter-spacing: 1px;
        }

        .table-container {
            background-color: #111;
            border: 1px solid #FFD700;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
        }

        .table-dark th,
        .table-dark td {
            color: #FFD700;
            vertical-align: middle;
        }

        .table-dark th {
            background-color: #1a1a1a !important;
            border-bottom: 2px solid #FFD700;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .table-dark tr:hover {
            background-color: #222;
            transition: 0.3s ease;
        }

        .btn-outline-warning {
            border-color: #FFD700;
            color: #FFD700;
            transition: all 0.3s ease;
        }

        .btn-outline-warning:hover {
            background-color: #FFD700;
            color: #000;
        }

        .pagination {
            justify-content: center;
        }

        .alert {
            border-radius: 10px;
            font-size: 0.95rem;
        }

        .alert i {
            font-size: 1.4rem;
        }

        /* زر العودة */
        .top-bar {
            background-color: #111;
            padding: 15px 20px;
            border-radius: 10px;
            border: 1px solid #FFD700;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.15);
        }

        /* تحسين روابط الباجينيشن */
        .pagination .page-link {
            background-color: #111;
            color: #FFD700;
            border: 1px solid #FFD700;
        }

        .pagination .page-link:hover {
            background-color: #FFD700;
            color: #000;
        }

        .pagination .active .page-link {
            background-color: #FFD700;
            color: #000;
            border-color: #FFD700;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="top-bar d-flex justify-content-between align-items-center mb-4">
            <h3 class="m-0">Subscribers</h3>
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-warning">← Previous Page</a>
        </div>

        <div class="table-container">
            <table class="table table-dark table-striped align-middle mb-0">
                @if ($subscribers->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @forelse ($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscribers->firstItem() + $loop->index }}</td>
                            <td>{{ $subscriber->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-warning d-flex align-items-center justify-content-center shadow-sm border-0 mt-3" style="background-color:#2c2c2c; color:#FFD700;">
                                    <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
                                    <div>There are no subscribers!</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $subscribers->links('livewire::simple-bootstrap') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
