<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Item</title>
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
                    <h3 class="m-0"> Edit Item</h3>
                    <a href="{{route('items.index') }}" class="btn btn-sm btn-outline-warning">⬅ Previous Page</a>
                </div>

                <form method="POST" action="{{ route('items.update',$item->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" value="{{old('name',$item->name)}}" class="form-control @error('name') is-invalid @enderror" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                        <input type="text" id="type" name="type" value="{{old('role',$item->type)}}" class="form-control @error('type') is-invalid @enderror" >
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <textarea id="price" name="price" rows="3" class="form-control @error('price') is-invalid @enderror" >{{old('price',$item->price)}}</textarea>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea id="description" name="description" rows="3" class="form-control @error('description') is-invalid @enderror" >{{old('description',$item->description)}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image <span class="text-danger">*</span></label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" >
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="text-danger">Limit: 2MB | MIMES: jpeg, png, jpg, webp</small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="reset" class="btn btn-secondary">↺ Reset</button>
                        <button type="submit" class="btn btn-gold">💾 Update</button>
                    </div>
                </form>
            </div>
            <div>
                @if(session('successEditItem'))
                    <div class="alert alert-success alert-dismissible fade show text-center rounded shadow-sm p-3 mt-2 w-50 mx-auto" role="alert">
                        <strong>✔️ {{ session('successEditItem') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Bootstrap JS (Bundle) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>


