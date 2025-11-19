        <!-- Location Section -->
        <section id="location" class="location section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
            <h2>Location</h2>
            <p>{{$data['info']->address ?? "-"}}</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.684949335945!2d-73.98658242357565!3d40.75853057126168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQ1JzMwLjciTiA3M8KwNTknMDcuNyJX!5e0!3m2!1sen!2sus!4v1654321234567!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="info-container">
                    <div class="section-header">
                    <h2>Find Us</h2>
                    <p>Visit Us Today</p>
                    </div>

                    <div class="info-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="info-content">
                        <h3>Our Location</h3>
                        <p>{{$data['info']->address ?? "-"}}</p>
                    </div>
                    </div>

                    <div class="info-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="info-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="info-content">
                        <h3>Reservations</h3>
                        <p>{{$data['info']->phone ?? "-"}}</p>
                        <p class="small-text">We recommend making reservations at least 48 hours in advance</p>
                    </div>
                    </div>

                    <div class="info-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="info-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div class="info-content">
                        <h3>Opening Hours</h3>
                        <?php use Carbon\Carbon; ?>
                        @forelse ($data['openingHours'] as $openingHour )
                            <p>{{$openingHour->from_day.' - '.$openingHour->to_day.': '.Carbon::parse($openingHour->from_time)->format('h:i A').' - '.Carbon::parse($openingHour->to_time)->format('h:i A')}}</p>
                        @empty
                            -
                        @endforelse
                    </div>
                    </div>

                    <div class="cta-wrapper" data-aos="fade-up" data-aos-delay="600">
                    <a href="#book-a-table" class="btn-book">Make a Reservation</a>
                    <a href="#contact" class="btn-contact">Contact Us</a>
                    </div>
                </div>
                </div>
            </div>

            </div>

        </section>
        <!-- /Location Section -->
