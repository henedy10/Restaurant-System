        <!-- Menu Section -->
        <section id="menu" class="menu section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Menu</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                        <div class="menu-filters isotope-filters mb-5">
                            <ul>
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".filter-main">Main Courses</li>
                                <li data-filter=".filter-dessert">Desserts</li>
                                <li data-filter=".filter-drinks">Drinks</li>
                            </ul>
                        </div>

                        <div class="menu-container isotope-container row gy-4">
                            <!-- Regular Menu Items -->
                            @forelse ( $Menu as $Category )
                                @php
                                    $filterClass = match($Category->type) {
                                        'Dessert'=> 'filter-dessert' ,
                                        'Drink'=> 'filter-drinks' ,
                                        default=> 'filter-main',
                                    };
                                @endphp
                                <div class="col-lg-6 isotope-item {{$filterClass}}">
                                    <div class="menu-item d-flex align-items-center gap-4">
                                        <img src="{{$Category->image}}" alt="Starter" class="menu-img img-fluid rounded-3">
                                        <div class="menu-content">
                                            <h5>{{$Category->name}}<span class="menu-tag">{{$Category->type}}</span></h5>
                                            <p>{{$Category->description}}</p>
                                            <div class="price">{{$Category->price}}$</div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger fs-3"> * There is no menu now </p>
                            @endforelse
                        </div>
                    </div>

                    <div class="text-center mt-5" data-aos="fade-up">
                        <a href="{{url('/download')}}" download class="download-menu">
                            <i class="bi bi-file-earmark-pdf"></i> Download Full Menu
                        </a>
                    </div>

                    <!-- Chef's Specials -->
                    <div class="col-12 mt-5" data-aos="fade-up">
                        <div class="specials-badge">
                            <span><i class="bi bi-award"></i> Chef's Specials</span>
                        </div>
                        <div class="specials-container">
                            @forelse ($specialMenu as $specialCategory)
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="menu-item special-item">
                                            <div class="menu-item-img">
                                                <img src="assets/img/restaurant/main-3.webp" alt="Special Dish" class="img-fluid">
                                                <div class="menu-item-badges">
                                                    <span class="badge-special">Special</span>
                                                    <span class="badge-vegan">{{$specialCategory->type}}</span>
                                                </div>
                                            </div>
                                            <div class="menu-item-content">
                                                <h4>{{$specialCategory->name}}</h4>
                                                <p>{{$specialCategory->description}}</p>
                                            <div class="menu-item-price">{{$specialCategory->price}}</div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger fs-3"> * There is no chef's Special now! </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Menu Section -->
