<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tables — Admin UI</title>
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

                        <form method="POST" action="{{route('tables.update',$info['infoTables']->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row g-2">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 accent">Tables</h5>
                            </div>

                                <div class="row g-2">
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label accent">Number Of Tables <span class="text-danger">*</span></label>
                                        <input
                                            type="number"
                                            name="number_of_tables"
                                            class="form-control bg-dark text-white"
                                            id="number_of_tables"
                                            value="{{$info['infoTables']->number_of_tables}}"
                                            min="1"
                                        >
                                        <span class="text-danger">
                                            @error('number-of-tables') {{"* ".$message}} @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="booking-availability" class="form-label accent d-block mb-2  text-warning">
                                            Booking Availability
                                        </label>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input border-0"
                                                type="checkbox"
                                                name="booking_availability"
                                                id="booking-availability"
                                                checked
                                                value= '1'
                                                style="width: 3rem; height: 1.5rem; cursor:pointer;">
                                            <label class="form-check-label text-white ms-2" for="booking-availability">
                                                <span id="status_enable" class="text-success">Enable</span> / <span id="status_disable">Disable</span>
                                            </label>
                                        </div>

                                        <span class="text-danger d-block mt-1">
                                            @error('booking_availability') {{"* ".$message}} @enderror
                                        </span>
                                    </div>

                                </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-gold" id="save_btn">Save</button>
                                <button type="reset" class="btn btn-outline-light">Reset</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    <!-- Content -->
    <div id="content">
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Total Tables</h5>
                        <p class="card-text fs-5">{{$info['infoTables']->number_of_tables}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Total Booking Tables</h5>
                        <p class="card-text fs-5">{{$info['countBookingTables']}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Total Availability Tables</h5>
                        <p class="card-text fs-5">{{($info['infoTables']->number_of_tables)-$info['countBookingTables']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div>
            @if(session('successMsg'))
            <div class="alert alert-success alert-dismissible fade show text-center rounded shadow-sm p-3 mt-2 w-50 mx-auto" role="alert">
                <strong>✔️ {{ session('successMsg') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let checkbox       = document.getElementById('booking-availability')
        let status_enable  = document.getElementById('status_enable')
        let status_disable = document.getElementById('status_disable')
        let saveStatus     = localStorage.getItem('booking-availability')
        let saveButton     = document.getElementById('save_btn')

        if(saveStatus === 'true'){
            checkbox.checked = true
            checkbox.value = '1'
            checkbox.classList.add('bg-success')
            checkbox.classList.remove('bg-danger')
            status_enable.classList.add('text-success')
            status_disable.classList.remove('text-danger')
        }else{
            checkbox.checked = false
            checkbox.value = '0'
            checkbox.classList.remove('bg-success')
            checkbox.classList.add('bg-danger')
            status_enable.classList.remove('text-success')
            status_disable.classList.add('text-danger')
        }


        checkbox.addEventListener('change',function(){
            if(checkbox.checked){
                saveButton.addEventListener('click',function (){
                    localStorage.setItem('booking-availability','true')
                })
                checkbox.classList.add('bg-success')
                checkbox.classList.remove('bg-danger')
                status_enable.classList.add('text-success')
                status_disable.classList.remove('text-danger')
                checkbox.value = 1
            }else{
                saveButton.addEventListener('click',function(){
                    localStorage.setItem('booking-availability','false')
                })
                checkbox.classList.remove('bg-success')
                checkbox.classList.add('bg-danger')
                status_enable.classList.remove('text-success')
                status_disable.classList.add('text-danger')
                checkbox.value = 0
            }
        })
    </script>
</body>
</html>
