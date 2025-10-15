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

                        <form method="#" action="#">
                            @csrf
                            <div class="row g-2">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 accent">Tables</h5>
                            </div>

                                <div class="row g-2">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label accent">Number Of Tables <span class="text-danger">*</span></label>
                                        <input
                                            type="number"
                                            name="number_of_tables"
                                            class="form-control bg-dark text-white"
                                            id="number_of_tables"
                                            min="1"
                                        >
                                        <span class="text-danger">
                                            @error('number-of-tables') {{"* ".$message}} @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label accent">Booking Availability</label>
                                        <input type="checkbox" name="booking_availability" class="bg-dark text-white" id="booking-availability">
                                        <span class="text-danger">
                                            @error('booking-availability') {{"* ".$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-gold">Save</button>
                                <button type="reset" class="btn btn-outline-light">Reset</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
