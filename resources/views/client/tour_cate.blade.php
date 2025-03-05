@include('client.blocks.header')
@include('client.blocks.nav')
<!-- Page Banner Start -->
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover"
    style="background-image: url({{asset('FE/assets/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="banner-inner text-white mb-50">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">{{$category->title}}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">{{$category->title}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Tour List Area start -->
{{-- <h2>HELLO</h2> --}}
<section class="tour-list-page py-100 rel z-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-10 rmb-75">
                <div class="shop-sidebar mb-30">
                    <div class="widget widget-filter" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                        data-aos-offset="50">
                        <h6 class="widget-title">Filter by Price</h6>
                        <div class="price-filter-wrap">
                            <div class="price-slider-range"></div>
                            <div class="price">
                                <span>Price </span>
                                <input type="text" id="price" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-activity" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <a href="{{route('tour')}}"><h6 class="widget-title">Danh Mục Tour</h6></a>
                        <ul class="radio-filter">
                            @foreach ($categories as $item)
                            <li>
                                <div style="margin-left: 20px">
                                    <a  href="{{route('tour_cate', $item->cate_id)}}">{{$item->title}}</a>
                                    <hr style="width: 200px;">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget widget-reviews" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h6 class="widget-title">By Reviews</h6>
                        <ul class="radio-filter">
                            <li>
                                <input class="form-check-input" type="radio" checked name="ByReviews" id="review1">
                                <label for="review1">
                                    <span class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="ByReviews" id="review2">
                                <label for="review2">
                                    <span class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt white"></i>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="ByReviews" id="review3">
                                <label for="review3">
                                    <span class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star white"></i>
                                        <i class="fas fa-star-half-alt white"></i>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="ByReviews" id="review4">
                                <label for="review4">
                                    <span class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star white"></i>
                                        <i class="fas fa-star white"></i>
                                        <i class="fas fa-star-half-alt white"></i>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="radio" name="ByReviews" id="review5">
                                <label for="review5">
                                    <span class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star white"></i>
                                        <i class="fas fa-star white"></i>
                                        <i class="fas fa-star white"></i>
                                        <i class="fas fa-star-half-alt white"></i>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="widget widget-cta" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="content text-white">
                        <span class="h6">Explore The World</span>
                        <h3>Best Tourist Place</h3>
                        <a href="tour-grid.html" class="theme-btn style-two bgc-secondary">
                            <span data-hover="Explore Now">Explore Now</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="image">
                        <img src="assets/images/widgets/cta-widget.png" alt="CTA">
                    </div>
                    <div class="cta-shape"><img src="assets/images/widgets/cta-shape2.png" alt="Shape"></div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="shop-shorter rel z-3 mb-20">
                    <ul class="grid-list mb-15 me-2">
                        <li><a href="#"><i class="fal fa-border-all"></i></a></li>
                        <li><a href="#"><i class="far fa-list"></i></a></li>
                    </ul>
                    <div class="sort-text mb-15 me-4 me-xl-auto">
                        34 Tours found
                    </div>
                    <div class="sort-text mb-15 me-4">
                        Sort By
                    </div>
                    <select>
                        <option value="default" selected="">Short By</option>
                        <option value="new">Newness</option>
                        <option value="old">Oldest</option>
                        <option value="hight-to-low">High To Low</option>
                        <option value="low-to-high">Low To High</option>
                    </select>
                </div>
                @foreach ($tours as $item)
                <div class="destination-item style-three bgc-lighter" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="image">
                        <span class="badge bgc-pink">Nổi Bật</span>
                        <a href="" class="heart"><i class="fas fa-heart"></i></a>
                        <img src="{{asset('upload/tours/' . $item->image)}}" alt="Tour List">
                    </div>
                    <div class="content">
                        <div class="destination-header">
                            <span class="location"><i class="fal fa-map-marker-alt"></i>{{$item->destination}}</span>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <h5><a href="{{route('tour_detail', $item->tour_id)}}">{{$item->title}}</a></h5>
                        <ul class="blog-meta">
                            <li><i class="far fa-clock"></i>{{$item->duration}}</li>
                            <li><i class="far fa-user"></i>{{$item->quantity}} slot</li>
                        </ul>
                        <div class="destination-footer"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                            <div class="price-wrapper" style="display: flex; flex-direction: column">
                                <span class="price"><span>{{number_format($item->price_adult)}}</span>/Người Lớn</span>
                                <span class="price"><span>{{number_format($item->price_child)}}</span>/Trẻ Em</span>
                            </div>
                            <a href="tour-details.html" class="theme-btn style-two style-three"
                                style="white-space: nowrap;">
                                <span data-hover="Book Now">Book Now</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach
                <ul class="pagination pt-15 flex-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <li class="page-item disabled">
                        <span class="page-link"><i class="far fa-chevron-left"></i></span>
                    </li>
                    <li class="page-item active">
                        <span class="page-link">
                            1
                            <span class="sr-only">(current)</span>
                        </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="far fa-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Tour List Area end -->


<!-- Newsletter Area start -->
{{-- <section class="newsletter-three bgc-primary py-100 rel z-1"
    style="background-image: url(assets/images/newsletter/newsletter-bg-lines.png);">
    <div class="container container-1500">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsletter-content-part text-white rmb-55" data-aos="zoom-in-right" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="section-title counter-text-wrap mb-45">
                        <h2>Subscribe Our Newsletter to Get more offer & Tips</h2>
                        <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most
                            popular experience you’ll remember</p>
                    </div>
                    <form class="newsletter-form mb-15" action="#">
                        <input id="news-email" type="email" placeholder="Email Address" required>
                        <button type="submit" class="theme-btn bgc-secondary style-two">
                            <span data-hover="Subscribe">Subscribe</span>
                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </form>
                    <p>No credit card requirement. No commitments</p>
                </div>
                <div class="newsletter-bg-image" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="1500"
                    data-aos-offset="50">
                    <img src="assets/images/newsletter/newsletter-bg-image.png" alt="Newsletter">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter-image-part bgs-cover"
                    style="background-image: url(assets/images/newsletter/newsletter-two-right.jpg);"
                    data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50"></div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Newsletter Area end -->

@include('client.blocks.footer')