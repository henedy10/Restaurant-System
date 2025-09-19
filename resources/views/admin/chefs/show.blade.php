<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chef Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #000; /* خلفية سوداء */
                color: #FFD700;        /* نص ذهبي */
            }
            .card {
                background-color: #111;
                border: 1px solid #FFD700;
                color: #FFD700;
            }
            .card img {
                border: 3px solid #FFD700;
            }
            .btn-gold {
                background-color: #FFD700;
                color: #000;
                font-weight: bold;
            }
            .btn-gold:hover {
                background-color: #e6c200;
                color: #000;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card text-center p-3 shadow-lg" style="width: 30rem; background-color:#111; border:1px solid #FFD700; color:#FFD700;">

                <img src="{{ asset('storage/' . $chef->image) }}"
                    class="rounded-circle mx-auto mb-3 img-fluid"
                    style="max-width:150px;"
                    alt="{{ $chef->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $chef->name }} Profile</h5>
                    <p class="card-text">{{ $chef->info }}</p>
                </div>

                <div class="card-body">
                    <h5 class="text-danger"> Role :</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-warning">{{$chef->role}}</li>
                    </ul>
                </div>

                @if ($chef->awards->count() > 0)
                    <div class="card-body">
                        <h5 class="text-danger"> Awards:</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($chef->awards as $award)
                                <li class="list-group-item bg-dark text-warning">{{ $award->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <a href="{{ route('chefs.index') }}" class="btn btn-warning">⬅ Previous</a>
                </div>
            </div>
        </div>
    </body>
</html>
