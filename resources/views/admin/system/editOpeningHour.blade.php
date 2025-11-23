<?php use Carbon\Carbon; ?>
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
                            <a href="{{route('system.index')}}" class="btn btn-sm btn-outline-warning">⬅ Previous Page</a>
                        </div>

                        <hr class="border-secondary">


                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0 accent">Edit Opening Hours</h5>
                        </div>
                        <form action="{{route('opening-hours.update',$openingHour->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="hour-row row g-2 align-items-end">
                                <div class="col-12 col-md-3">
                                    <label class="accent">From Day <span class="text-danger">*</span></label>
                                    <select class="form-select bg-dark text-white" name="from_day">
                                        <option value="{{$openingHour->from_day}}" selected> {{$openingHour->from_day}} </option>
                                        <option value="Friday">             Friday          </option>
                                        <option value="Saturday">           Saturday        </option>
                                        <option value="Sunday">             Sunday          </option>
                                        <option value="Monday">             Monday          </option>
                                        <option value="Tuesday">            Tuesday         </option>
                                        <option value="Wednesday">          Wednesday       </option>
                                        <option value="Thursday">           Thursday        </option>
                                    </select>
                                    <span class="text-danger">@error('from_day') {{ $message }} @enderror</span>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label class="accent">To Day</label>
                                    <select class="form-select bg-dark text-white" name="to_day">
                                        <option value="{{$openingHour->to_day}}" selected> {{$openingHour->to_day}} </option>
                                        <option value="">                     Null       </option>
                                        <option value="Friday">             Friday       </option>
                                        <option value="Saturday">           Saturday     </option>
                                        <option value="Sunday">             Sunday       </option>
                                        <option value="Monday">             Monday       </option>
                                        <option value="Tuesday">            Tuesday      </option>
                                        <option value="Wednesday">          Wednesday    </option>
                                        <option value="Thursday">           Thursday     </option>
                                    </select>
                                    <span class="text-danger">@error('to_day') {{ $message }} @enderror</span>
                                </div>
                                <div class="col-6 col-md-2">
                                    <label class="accent">From Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control bg-dark text-white" name="from_time" value="{{old('from_time',Carbon::parse($openingHour->from_time)->format('H:i'))}}">
                                    <span class="text-danger">@error('from_time') {{ $message }} @enderror</span>
                                </div>
                                <div class="col-6 col-md-2">
                                    <label class="accent">To Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control bg-dark text-white" name="to_time" value="{{old('to_time',Carbon::parse($openingHour->to_time)->format('H:i'))}}">
                                    <span class="text-danger">@error('to_time') {{ $message }} @enderror</span>
                                </div>
                                <div class="col-12 col-md-2 d-flex gap-2 justify-content-start justify-content-md-end mt-3 mt-md-0">
                                    <button type="reset"
                                            class="btn btn-outline-danger btn-sm px-3"
                                    >
                                        Reset
                                    </button>

                                    <button type="submit"
                                            class="btn btn-success btn-sm px-3"
                                            title="Save Period">
                                        Save
                                    </button>
                                </div>
                            </div>
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

