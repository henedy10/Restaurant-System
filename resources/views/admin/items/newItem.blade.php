<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Item Info</title>
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

                <img src="{{ asset('storage/' . $item->image) }}"
                    class="rounded-circle mx-auto mb-3 img-fluid"
                    style="max-width:150px;"
                    alt="{{ $item->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }} Info</h5>
                    <p class="card-text">{{ $item->description }}</p>
                </div>

                <div class="card-body">
                    <h5 class="text-danger"> Type :</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-warning">{{$item->type}}</li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="text-danger"> Price :</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-warning">{{$item->price}}</li>
                    </ul>
                </div>

            </div>
        </div>
    </body>
</html>
