<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant System — Opening Hours</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --gold: #d4af37;
            --bg: #0b0b0b;
            --card-bg: #111;
        }

        body {
            background: var(--bg);
            color: #fff;
            font-family: "Segoe UI", Tahoma, Verdana, sans-serif;
            padding: 30px;
        }

        .title-bar {
            border-bottom: 1px solid rgba(212,175,55,0.15);
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .accent {
            color: var(--gold);
        }

        .btn-gold {
            background: linear-gradient(to bottom, #d4af37, #b88d2c);
            color: #000;
            border: none;
            font-weight: 600;
        }

        .btn-gold:hover {
            opacity: 0.9;
        }

        .table-dark {
            background: #141414 !important;
        }

        .table-dark.table-striped tbody tr:nth-of-type(odd) {
            background-color: #1a1a1a !important;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .card-dark {
            background: var(--card-bg);
            border: 1px solid rgba(212,175,55,0.12);
            border-radius: 10px;
            padding: 20px;
        }

        #icon {
            transition: 0.2s;
        }

        #icon:hover {
            background-color: #ffe4e4;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center title-bar">
        <h3 class="accent mb-0">Restaurant System — Admin</h3>
        <a href="{{route('dashboard')}}" class="btn btn-outline-warning btn-sm">⬅ Back</a>
    </div>

    <!-- Opening Hours Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="accent mb-0">Opening Hours</h4>

        <div class="position-relative d-flex align-items-center gap-2">
            <small id="hint" class="text-danger d-none">* You can add multiple periods for each day</small>
            <span id="icon"
                  class="text-danger border border-danger rounded-circle d-flex justify-content-center align-items-center"
                  style="width: 28px; height: 28px; font-weight: bold; cursor: pointer; background-color:#fff0f0;">
                !
            </span>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card-dark mb-4">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                @if ($openingHours->count() > 0)
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>From Day</th>
                            <th>To Day</th>
                            <th>From Time</th>
                            <th>To Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                @endif

                <tbody class="text-center">
                    @forelse ($openingHours as $openingHour)
                        <tr>
                            <td>{{ $openingHours->firstItem() + $loop->index }}</td>

                            <td class="fw-semibold">{{ $openingHour->from_day }}</td>

                            <td>{{ $openingHour->to_day ?? "-" }}</td>

                            <td>{{ Carbon::parse($openingHour->from_time)->format('h:i A') }}</td>

                            <td>{{ Carbon::parse($openingHour->to_time)->format('h:i A') }}</td>

                            <td>
                                <a href="{{route('opening-hours.edit',$openingHour->id)}}"
                                   class="btn btn-gold btn-sm me-1">
                                    Edit
                                </a>

                                <form action="{{route('opening-hours.destroy',$openingHour->id)}}"
                                      method="POST"
                                      onsubmit="return confirmDelete();"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-danger py-4">No opening hours added yet.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $openingHours->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Livewire Component -->
    @livewire('new-period')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>✅ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let Hint = document.getElementById('hint')
        let Icon = document.getElementById('icon')
        let Image_Hint = document.getElementById('image_hint')
        let Image_Icon = document.getElementById('image_icon')

        Icon.addEventListener("click",function (){
            Hint.classList.toggle('d-none')
        });

        Image_Icon.addEventListener("click",function (){
            Image_Hint.classList.toggle('d-none')
        });

        function confirmDelete() {
            return confirm("Are you sure to delete it?");
        }
    </script>
</body>
</html>
