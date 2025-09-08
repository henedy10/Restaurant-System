        <!-- Chefs Section -->
        <section id="chefs" class="chefs section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Chefs</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    @foreach ( $chefs as $chef )
                        <div class="col-lg-4">
                            <div class="chef-highlight" data-aos="fade-right" data-aos-delay="200">
                                <figure class="chef-image">
                                    <img src="{{$chef->image}}" class="img-fluid" alt="Executive Chef">
                                </figure>
                                <div class="chef-details">
                                        <h3>{{$chef->role}}</h3>
                                        <h2>{{$chef->name}}</h2>
                                    <div class="chef-awards">
                                        @forelse ( $chef->awards as $award )
                                            <span><i class="bi bi-star-fill"></i> {{$award->title}} </span>
                                        @empty
                                        
                                        @endforelse
                                    </div>
                                    <p>{{$chef->info}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Chefs Section -->
