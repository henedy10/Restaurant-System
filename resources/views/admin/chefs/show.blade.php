<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            color: #FFD700;
            font-family: 'Poppins', sans-serif;
        }

        .profile-card {
            background: linear-gradient(145deg, #0b0b0b, #1a1a1a);
            border: 1px solid #FFD700;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 40px rgba(255, 215, 0, 0.25);
        }

        .profile-img {
            border: 4px solid #FFD700;
            width: 160px;
            height: 160px;
            object-fit: cover;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
            transition: transform 0.4s ease;
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        h1 {
            color: #FFD700;
            font-weight: 700;
        }

        .list-group-item {
            background-color: transparent;
            border: none;
            color: #FFD700;
            text-align: left;
            font-weight: 500;
        }

        .section-title {
            color: #e63946;
            margin-top: 1rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .btn-gold {
            background-color: #FFD700;
            color: #000;
            font-weight: bold;
            border-radius: 30px;
            padding: 0.6rem 1.4rem;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background-color: #22211f;
            transform: scale(1.05);
        }

        .divider {
            width: 60px;
            height: 3px;
            background-color: #FFD700;
            margin: 0.5rem auto 1rem;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="profile-card text-center">

            <img src="{{ asset('storage/' . $chef->image) }}" alt="{{ $chef->name }}" class="rounded-circle profile-img mb-3">

            <h1>{{ $chef->name }}</h1>
            <div class="divider"></div>
            <p class="text-light">{{ $chef->info }}</p>

            <div class="mt-4">
                <h5 class="section-title">Role</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $chef->role }}</li>
                </ul>
            </div>

            @if ($chef->awards->count() > 0)
                <div class="mt-4">
                    <h5 class="section-title">Awards</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($chef->awards as $award)
                            <li class="list-group-item">🏆 {{ $award->title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('chefs.index') }}" class="btn btn-gold">⬅ Back to List</a>
            </div>
        </div>
    </div>
</body>
</html>
