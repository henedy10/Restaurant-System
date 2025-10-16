        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-content">
                            <h3>Our Culinary Journey</h3>
                            <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            <p>Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risustristique pos uere. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

                            <div class="chef-signature mt-4">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="assets/img/restaurant/chef-1.webp" class="chef-avatar rounded-circle" alt="Chef Portrait">
                                    </div>
                                    <div class="col">
                                        <p class="chef-message mb-2">"Cooking is a language through which all the following properties may be expressed: harmony, creativity, happiness, beauty, poetry, complexity, magic, humor, provocation and culture."</p>
                                        <p class="chef-name">Executive Chef</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="about-image-wrapper">
                            <img src="{{asset('storage/'.$aboutImages->path)??""}}" class="img-fluid main-image shadow" alt="{{$aboutImages->name ?? "About Picture"}}">
                            <span class="establishment-year d-flex align-items-center justify-content-center text-center">Est. 2005</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 pt-4 features-section">
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            <h4>Award Winning</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="bi bi-egg-fried"></i>
                            </div>
                            <h4>Fresh Ingredients</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4>Expert Team</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="bi bi-heart"></i>
                            </div>
                            <h4>Cooked with Love</h4>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="stats-container">
                            <div class="stat-item">
                                <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="0" class="purecounter">15</span>+</span>
                                <p class="stat-label">Years Experience</p>
                            </div>

                            <div class="stat-item">
                                <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="0" class="purecounter">5</span></span>
                                <p class="stat-label">Expert Chefs</p>
                            </div>

                            <div class="stat-item">
                                <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="0" class="purecounter">3</span></span>
                                <p class="stat-label">Culinary Awards</p>
                            </div>

                            <div class="stat-item">
                                <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="0" class="purecounter">15000</span>+</span>
                                <p class="stat-label">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->
