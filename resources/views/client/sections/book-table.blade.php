        <?php use Carbon\Carbon; ?>
        <!-- Book A Table Section -->
        <section id="book-a-table" class="book-a-table section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 mb-5">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="reservation-info">
                            <div class="text-content">
                                <h3>Book Your Table</h3>

                                <div class="reservation-details mt-4">
                                    <div class="detail-item">
                                        <i class="bi bi-clock"></i>
                                        <div>
                                            <h5>Opening Hours</h5>
                                            @forelse ($openingHours as $openingHour )
                                                <p>{{$openingHour->from_day.' - '.$openingHour->to_day.': '.Carbon::parse($openingHour->from_time)->format('h:i A').' - '.Carbon::parse($openingHour->to_time)->format('h:i A')}}</p>
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                    </div>

                                    <div class="detail-item">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>
                                            <h5>Location</h5>
                                            <p>{{$info->address ?? "-"}}</p>
                                        </div>
                                    </div>

                                    <div class="detail-item">
                                        <i class="bi bi-telephone"></i>
                                        <div>
                                            <h5>Call Us</h5>
                                            <p>{{$info->phone ?? "-"}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="reservation-image">
                            <img src="{{asset('storage/'.$bookingImages->path)??''}}" alt="{{$bookingImages->name ?? "Booking Picture"}}" class="img-fluid rounded">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                        <div class="reservation-form-wrapper">
                            <div class="form-header">
                                <h3>Book A Table</h3>
                                <p>Please fill the form below to make a reservation</p>
                            </div>
                                @if ($info->availability_booking)
                                    <form action="{{route('book-tables.store')}}" method="POST" role="form" class="mt-4">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-lg-4 form-group">
                                                <input type="text" name="name"  class="form-control" placeholder="Your Name" value="{{old('name')}}" >
                                                @error('name')
                                                    <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 form-group">
                                                <input type="email" class="form-control" name="email_booking" placeholder="Your Email" value="{{old('email_booking')}}" >
                                                @error('email_booking')
                                                    <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="Your Phone" value="{{old('phone')}}" >
                                                @error('phone')
                                                    <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 form-group">
                                                <select name="people" class="form-select" >
                                                    <option value="">Number of guests</option>
                                                    <option value="1">1 Person</option>
                                                    <option value="2">2 People</option>
                                                    <option value="3">3 People</option>
                                                    <option value="4">4 People</option>
                                                    <option value="5">5 People</option>
                                                    <option value="6">6 People</option>
                                                </select>
                                                    @error('people')
                                                        <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-lg-4 form-group">
                                                <input type="date" name="date" class="form-control" placeholder="Date" value="{{old('date')}}" >
                                                @error('date')
                                                    <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 form-group">
                                                <input type="time" class="form-control" name="time" id="time" placeholder="Time" value="{{old('time')}}" >
                                                @error('time')
                                                    <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-4">
                                                <textarea class="form-control" name="message" rows="3" placeholder="Special Requests (Optional)" value="{{old('message')}}"></textarea>
                                                @error('message')
                                                    <div class="text-danger mt-2 p-1 small">{{"* ".$message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show text-center rounded shadow-sm p-3 mt-2" role="alert">
                                                <strong>✔️ {{ session('success') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn-book-table">Book Now</button>
                                        </div>
                                    </form>
                                @else
                                    <div class="container mt-4">
                                        <div class="alert alert-warning d-flex align-items-center shadow-sm border-0" role="alert" style="background-color:#2c2c2c; color:#f8d7da;">
                                            <i class="bi bi-exclamation-triangle-fill me-2" style="color:#dc3545; font-size:1.2rem;"></i>
                                            <div>
                                                Table reservation is not available now!
                                            </div>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Book A Table Section -->
