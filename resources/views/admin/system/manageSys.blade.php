<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant System — Admin UI</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{ --gold: #D4AF37; --bg: #0b0b0b; }
        body{ background: var(--bg); color: #fff; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; }
        .card-dark{ background: #070707; border: 1px solid rgba(212,175,55,0.12); }
        .accent{ color: var(--gold); }
        .btn-gold{ background: linear-gradient(180deg, rgba(212,175,55,1), rgba(180,140,40,0.95)); color:#0b0b0b; border: none; }
        .form-control:focus{ box-shadow: 0 0 0 0.2rem rgba(212,175,55,0.12); border-color: rgba(212,175,55,0.8); }
        .hour-row{ border-left: 3px solid rgba(212,175,55,0.12); padding-left: 12px; margin-bottom:10px; }
        .small-muted{ color: rgba(255,255,255,0.6); }
        .remove-hour{ color: #ff6b6b; cursor: pointer; }
        @media (min-width: 992px){ .form-label{ font-weight:600; } }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div>
                <div class="card card-dark shadow-sm border border-warning">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="mb-0 accent">Restaurant System</h3>
                            <a href="{{route('home')}}" class="btn btn-sm btn-outline-warning">⬅ Previous Page</a>
                        </div>

                        <form method="POST" action="{{$info ? route('system.info.update',$info->id) : route('system.info.store')}}">
                            @if($info)
                                @method('PUT')
                            @endif
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label accent">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control bg-dark text-white" id="email" value="{{old('email',$info->email??" ")}}" >
                                    <span class="text-danger">
                                        @error('email') {{"* ".$message}} @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label accent">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control bg-dark text-white" id="phone" value="{{old('phone',$info->phone??" ")}}"  >
                                    <span class="text-danger">
                                        @error('phone') {{"* ".$message}} @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label accent">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-dark text-white" name="address" id="address" rows="2">{{old('address',$info->address??" ")}}</textarea>
                                <span class="text-danger">
                                    @error('address') {{"* ".$message}} @enderror
                                </span>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-gold">{{!$info ? "Save" : "Edit"}}</button>
                                <button type="reset" class="btn btn-outline-light">Reset</button>
                            </div>
                        </form>

                        @if (session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <strong>✅ Success!</strong> {{ session('successMsg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <hr class="border-secondary">


                        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                            <h5 class="accent">Opening Hours</h5>

                            <div class="position-relative d-flex align-items-center gap-2">
                                <small class="text-danger d-none" id="hint">
                                    * Add more than one period per day if necessary.
                                </small>
                                <span
                                    class="text-danger border border-danger rounded-circle d-inline-flex justify-content-center align-items-center"
                                    id="icon"
                                    style="width: 28px; height: 28px; font-weight: bold; cursor: pointer; background-color: #fff0f0;">
                                    !
                                </span>
                            </div>
                        </div>

                        <table class="table table-dark table-striped">
                            @if ($openingHours->count() > 0)
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From_Day</th>
                                        <th>To_Day</th>
                                        <th>From_Time</th>
                                        <th>To_Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            @endif

                            <tbody>
                                @forelse ( $openingHours as $openingHour )
                                    <tr>
                                        <td>{{$openingHours->firstItem() + $loop->index}}</td>
                                        <td>{{$openingHour->from_day}}</td>
                                        <td>{{$openingHour->to_day ?? "-"}}</td>
                                        <td>{{Carbon::parse($openingHour->from_time)->format('h:i A')}}</td>
                                        <td>{{Carbon::parse($openingHour->to_time)->format('h:i A')}}</td>
                                        <td>
                                            <a href="{{route('opening-hours.edit',$openingHour->id)}}" class="btn btn-sm btn-gold">Edit</a>
                                            <form   action="{{route('opening-hours.destroy',$openingHour->id)}}"
                                                    method="POST"
                                                    onsubmit="return confirmDelete();"
                                                    style="display: inline;"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        {{ $openingHours->links('pagination::bootstrap-4') }}

                        @livewire('new-period')

                        <hr class="border-secondary">
                        <div>
                            <form action="{{route('system.images.store')}}" method="POST" enctype="multipart/form-data"
                                class="p-4 rounded-4 shadow-lg"
                                style="background-color:#1e1e1e; max-width:100%; margin:auto; color:white;">
                                @csrf

                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                                        <h5 class="accent text-warning mb-3 fw-bold">Images</h5>
                                        <div class="position-relative d-flex align-items-center gap-2 flex-column">
                                            <span
                                                class="text-danger border border-danger rounded-circle d-inline-flex justify-content-center align-items-center"
                                                id="image_icon"
                                                style="width: 28px; height: 28px; font-weight: bold; cursor: pointer; background-color: #fff0f0;">
                                                !
                                            </span>
                                            <pre class="text-danger d-none" id="image_hint">
                                                * You can add more than image for Hero Section.
                                                * You can add only one image for About Section and Booking Section.
                                            </pre>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column gap-3">
                                        <div class="p-3 rounded-3" style="background-color:#2b2b2b;">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-4">
                                                    <label for="image" class="mb-1">Image</label>
                                                    <input type="file" name="image" id="image"
                                                        class="form-control form-control-sm bg-dark text-white border-secondary">
                                                    @error('image')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="name" class="mb-1">Name</label>
                                                    <input type="text" id="name" name="name" placeholder="Enter image's name"
                                                        class="form-control form-control-sm bg-dark text-white border-secondary">
                                                    @error('name')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="section" class="mb-1">Section</label>
                                                    <select name="section" id="section" class="form-control form-control-sm bg-dark text-white border-secondary">
                                                        <option value="">        Select Section</option>
                                                        <option value="Hero">    Hero Section</option>
                                                        <option value="About">   About Section</option>
                                                        <option value="Booking"> Booking Section</option>
                                                    </select>
                                                    @error('section')
                                                        {{$message}}
                                                    @enderror
                                                </div>
                                                <!-- Submit Button -->
                                                <div class="text-end mt-4">
                                                    <button type="submit" class="btn btn-warning fw-bold px-4">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <strong>✅ Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
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
