<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Chef</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
            background-color: #000;
            color: #FFD700;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            }
            .card-gold {
            background-color: #111;
            border: 1px solid #FFD700;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
            }
            .form-control,
            .form-select {
            background-color: #1c1c1c;
            color: #FFD700;
            border: 1px solid #FFD700;
            }
            .form-control::placeholder {
            color: #FFD700;
            opacity: 0.7;
            }
            .form-control:focus,
            .form-select:focus {
            box-shadow: 0 0 8px #FFD700;
            border-color: #FFD700;
            background-color: #222;
            color: #FFD700;
            }
            .btn-gold {
            background-color: #FFD700;
            color: #000;
            font-weight: 600;
            border-radius: .5rem;
            }
            .btn-gold:hover {
            background-color: #e6c200;
            color: #000;
            }
            label {
            font-weight: 500;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card-gold">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="m-0"> Add New Chef</h3>
                    <a href="{{route('chefs.index') }}" class="btn btn-sm btn-outline-warning">⬅ Previous Page</a>
                </div>

                <form method="POST" action="{{ route('chefs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                        <input type="text" id="role" name="role" value="{{old('role')}}" class="form-control @error('role') is-invalid @enderror" >
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="info" class="form-label">Info <span class="text-danger">*</span></label>
                        <textarea id="info" name="info" rows="3" class="form-control @error('info') is-invalid @enderror" >{{old('info')}}</textarea>
                        @error('info')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image <span class="text-danger">*</span></label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" >
                        @error('image')
                            <div class="text-danger ">{{ $message }}</div>
                        @enderror
                        <small class="text-danger">Limit: 2MB | MIMES: jpeg, png, jpg, webp</small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="reset" class="btn btn-secondary">↺ Reset</button>
                        <button type="submit" class="btn btn-gold">💾 Save</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
