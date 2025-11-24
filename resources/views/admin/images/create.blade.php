<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Upload</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --gold: #d4af37;
            --dark: #1a1a1a;
            --card: #242424;
        }

        body {
            background: #0f0f0f;
            color: #fff;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }

        .form-card {
            background: var(--card);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid rgba(212,175,55,0.15);
            max-width: 900px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }

        .accent-title {
            color: var(--gold);
            font-weight: 700;
            font-size: 20px;
        }

        .hint-icon {
            width: 30px;
            height: 30px;
            font-weight: bold;
            cursor: pointer;
            color: #b10000;
            background: #ffe4e4;
            border: 1px solid #ff9c9c;
            border-radius: 50%;
            transition: 0.2s;
        }

        .hint-icon:hover {
            background: #ffcece;
        }

        pre#image_hint {
            margin: 0;
            font-size: 13px;
            color: #ff6c6c;
            white-space: pre-line;
        }

        .input-dark {
            background: #111 !important;
            color: #fff !important;
            border: 1px solid #444 !important;
        }

        .input-dark:focus {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 0.15rem rgba(212, 175, 55, 0.35) !important;
        }

        .btn-gold {
            background: linear-gradient(to bottom, #d4af37, #b88d2c);
            color: #000;
            border: none;
            font-weight: 700;
            padding: 8px 25px;
        }

        .btn-gold:hover {
            opacity: .9;
        }
    </style>
</head>

<body>

    <div class="form-card">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0 accent-title">Restaurant System</h3>
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-outline-warning">⬅ Previous Page</a>
        </div>

        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-secondary">
            <h4 class="accent-title mb-0">Upload Image</h4>

            <div class="d-flex flex-column align-items-center gap-1">
                <span id="image_icon" class="d-flex justify-content-center align-items-center hint-icon">
                    !
                </span>

                <pre id="image_hint" class="d-none">
                    * You can add multiple images for Hero Section.
                    * Only one image allowed for About & Booking sections.
                </pre>
            </div>
        </div>

        <!-- Form -->
        <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                <!-- Image -->
                <div class="col-md-4">
                    <label class="mb-1">Image</label>
                    <input type="file" name="image" id="image" class="form-control form-control-sm input-dark">
                    @error('image')
                        <span class="text-danger small">{{$message}}</span>
                    @enderror
                </div>

                <!-- Name -->
                <div class="col-md-4">
                    <label class="mb-1">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter image name"
                           class="form-control form-control-sm input-dark">
                    @error('name')
                        <span class="text-danger small">{{$message}}</span>
                    @enderror
                </div>

                <!-- Section -->
                <div class="col-md-4">
                    <label class="mb-1">Section</label>
                    <select name="section" id="section" class="form-control form-control-sm input-dark">
                        <option value="">Select Section</option>
                        <option value="Hero">Hero Section</option>
                        <option value="About">About Section</option>
                        <option value="Booking">Booking Section</option>
                    </select>
                    @error('section')
                        <span class="text-danger small">{{$message}}</span>
                    @enderror
                </div>

                <!-- Button -->
                <div class="col-12 text-end mt-3">
                    <button class="btn btn-gold">Save</button>
                </div>

            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>✅ Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let Image_Hint = document.getElementById('image_hint')
        let Image_Icon = document.getElementById('image_icon')

        Image_Hint.addEventListener("click",function (){
            Hint.classList.toggle('d-none')
        });

        Image_Icon.addEventListener("click",function (){
            Image_Hint.classList.toggle('d-none')
        });
    </script>

</body>
</html>
