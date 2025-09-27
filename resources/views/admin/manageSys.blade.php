<!DOCTYPE html>
<html lang="en">
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

                        <form method="POST" action="{{route('system.info.store')}}">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label accent">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control bg-dark text-white" id="email" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label accent">Phone Number</label>
                                    <input type="tel" class="form-control bg-dark text-white" id="phone" >
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label accent">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-dark text-white" id="address" rows="2"></textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-gold">Save</button>
                                <button type="reset" class="btn btn-outline-light">Reset</button>
                            </div>
                        </form>

                        <hr class="border-secondary">

                        <form method="POST">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 accent">Opening Hours</h5>
                                <small class="text-danger">* Add more than one period per day if necessary.</small>
                            </div>
                            @livewire('new-period')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
