@include('client.blocks.header');
@include('client.blocks.nav');
<style>
    .list-rating-check {
        display: flex;
        flex-direction: row-reverse;
    }

    .list-rating-check input {
        display: none;
    }

    .list-rating-check label {
        font-size: 40px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .list-rating-check label:before {
        content: "\2605";
        /* Ký tự ngôi sao Unicode */
    }

    .list-rating-check input:checked~label,
    .list-rating-check label:hover,
    .list-rating-check label:hover~label {
        color: #ffb321;
    }
</style>
<!-- Page Banner Start -->
<section class="page-banner-two rel z-1" style="margin-top: 100px">
    <div class="container-fluid">
        <hr class="mt-0">
        <div class="container">
            <div class="banner-inner pt-15 pb-25">
                <span style="font-size: 30px" class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500"
                    data-aos-offset="50"><i class="fal fa-map-marker-alt"></i> {{$tourDetail->destination}}</span>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                        data-aos-duration="1500" data-aos-offset="50">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tour Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Tour Gallery start -->
<div class="tour-gallery">
    <div class="container-fluid">
        <div class="row gap-10 justify-content-center rel">
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <img src="{{(asset('upload/galleries/' . $tourDetail->images[0]))}}" alt="Destination">
                </div>
                <div class="gallery-item">
                    <img src="{{(asset('upload/galleries/' . $tourDetail->images[1]))}}" alt="Destination">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <img src="{{(asset('upload/galleries/' . $tourDetail->images[2]))}}" alt="Destination">
                </div>
                <div class="gallery-item">
                    <img src="{{(asset('upload/galleries/' . $tourDetail->images[5]))}}" alt="Destination">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <img src="{{(asset('upload/galleries/' . $tourDetail->images[3]))}}" alt="Destination">
                </div>
                <div class="gallery-item">
                    <img src="{{(asset('upload/galleries/' . $tourDetail->images[4]))}}" alt="Destination">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tour Gallery End -->


<!-- Tour Header Area start -->
<section class="tour-header-area pt-70 rel z-1">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-7">
                <div class="tour-header-content mb-15" data-aos="fade-left" data-aos-duration="1500"
                    data-aos-offset="50">
                    <span class="location d-inline-block mb-10"><i class="fal fa-map-marker-alt"></i>
                        {{$tourDetail->destination}} </span>
                    <div class="section-title pb-5">
                        <h2>{{$tourDetail->title}}</h2>
                    </div>
                    <div class="ratting">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 text-lg-end" data-aos="fade-right" data-aos-duration="1500"
                data-aos-offset="50">
                <div class="tour-header-social mb-10">
                    <a href="#"><i class="far fa-share-alt"></i>Share tours</a>
                    <a href="#"><i class="fas fa-heart bgc-secondary"></i>Wish list</a>
                </div>
            </div>
        </div>
        <hr class="mt-50 mb-70">
    </div>
</section>
<!-- Tour Header Area end -->


<!-- Tour Details Area start -->
<section class="tour-details-page pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tour-details-content">
                    <h3>Khám Phá Tours</h3>
                    <p> {!!$tourDetail->description!!} </p>
                    <div class="row pb-55">
                        <div class="col-md-6">
                            <div class="tour-include-exclude mt-30">
                                <h5>Bao Gồm</h5>
                                <ul class="list-style-one check mt-25">
                                    <li>{!!$tourDetail->include!!}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tour-include-exclude mt-30">
                                <h5>Không Bao Gồm</h5>
                                <ul class="list-style-one mt-25">
                                    <li>{!!$tourDetail->un_include!!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Activities</h3>
                <div class="tour-activities mt-30 mb-45">
                    <div class="tour-activity-item">
                        <i class="flaticon-hiking"></i>
                        <b>Hiking</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-fishing"></i>
                        <b>Fishing</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-man"></i>
                        <b>Kayak shooting</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-kayak-1"></i>
                        <b>Kayak</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-bonfire"></i>
                        <b>Campfire</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-flashlight"></i>
                        <b>Night Exploring</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-cycling"></i>
                        <b>Biking</b>
                    </div>
                    <div class="tour-activity-item">
                        <i class="flaticon-meditation"></i>
                        <b>Yoga</b>
                    </div>
                </div>

                <h3>Lịch Trình</h3>
                <div class="accordion-two mt-25 mb-60" id="faq-accordion-two">
                    @foreach ($tourDetail->time_line as $item)
                    <div class="accordion-item">
                        <h5 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo{{$item->timeLine_id}}">
                                {{$item->title}}
                            </button>
                        </h5>
                        <div id="collapseTwo{{$item->timeLine_id}}" class="accordion-collapse collapse"
                            data-bs-parent="#faq-accordion-two">
                            <div class="accordion-body">
                                <p>{!!$item->description!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <h3>Đánh Giá Khách Hàng</h3>
                <div class="clients-reviews bgc-black mt-30 mb-60">
                    <div class="left">
                        <b>{{number_format($getReview->average_rating, 1) . " / 5"}}</b>
                        <span>({{$getReview->total_reviews }} đánh giá)</span>
                        <div class="ratting">
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($getReview->average_rating))
                                <i class="fas fa-star text-warning"></i> <!-- Sao đầy -->
                                @elseif ($i - 0.5 <= $getReview->average_rating)
                                    <i class="fas fa-star-half-alt text-warning"></i> <!-- Sao nửa -->
                                    @else
                                    <i class="far fa-star text-warning"></i> <!-- Sao rỗng -->
                                    @endif
                                    @endfor
                        </div>
                    </div>
                </div>
                @if ($getReview->total_reviews != 0)
                <div class="comments mt-30 mb-60">
                    <div class="comment-body" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="author-thumb">
                            <img src="{{asset('upload/avatas/' . $tourDetail->avata)}}" alt="Author">
                        </div>
                        <div class="content">
                            <h6>{{$tourDetail->user_name}}</h6>
                            <div class="ratting">
                                @for ($i = 0; $i < 5; $i++) @if (($getReview->average_rating && $i < $getReview->
                                        average_rating))
                                        <i class="fas fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                            </div>
                            <span class="time">{{$tourDetail->title. ' - ' . $tourDetail->duration}}</span>
                            <p>{{$tourDetail->review_message}}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if ($can_review === true)
                <h3>Đánh Giá</h3>
                <form id="comment-form" class="comment-form bgc-lighter z-1 rel mt-30"
                    action="{{route('insert_review', ['id' => $tourDetail->tour_id])}}" method="post" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    @csrf
                    <div class="comment-review-wrap">
                        <div class="comment-ratting-item">
                            <h3 class="title">Đánh Giá</h3>
                            <div class="list-rating-check">
                                <input type="radio" id="star5" name="danh_gia_sao" value="5">
                                <label for="star5" title="5 sao"></label>
                                <input type="radio" id="star4" name="danh_gia_sao" value="4">
                                <label for="star4" title="4 sao"></label>
                                <input type="radio" id="star3" name="danh_gia_sao" value="3">
                                <label for="star3" title="3 sao"></label>
                                <input type="radio" id="star2" name="danh_gia_sao" value="2">
                                <label for="star2" title="2 sao"></label>
                                <input type="radio" id="star1" name="danh_gia_sao" value="1">
                                <label for="star1" title="1 sao"></label>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-30 mb-40">
                    <div class="row gap-20 mt-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Bình Luận</label>
                                <textarea name="comment" id="message" class="form-control" rows="5"
                                    required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <button type="submit" class="theme-btn bgc-secondary style-two">
                                    <span data-hover="Submit reviews">Submit reviews</span>
                                    <i class="fal fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @endif

            </div>
            <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                <div class="blog-sidebar tour-sidebar">

                    <div class="widget widget-booking" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h5 class="widget-title">Đặt Tour</h5>
                        <form action="{{route('booking', ['id' => $tourDetail->tour_id])}}" method="POST">
                            @csrf
                            <div class="date mb-25">
                                <b>Ngày Bắt Đầu:</b>
                                <input type="date" value="{{$tourDetail->start_date}}" name="startDate" disabled>
                            </div>
                            <hr>
                            <div class="date mb-25">
                                <b>Ngày Kết Thúc:</b>
                                <input type="date" value="{{$tourDetail->end_date}}" name="endDate" disabled>
                            </div>
                            <hr>
                            <div class="time py-5">
                                <b>Thời Gian :</b>
                                <p>{{$tourDetail->duration}}</p>
                                <input type="hidden" name="duration" value="{{$tourDetail->duration}}">
                            </div>
                            <hr class="mb-25">
                            <h6>Giá Vé:</h6>
                            <ul class="tickets clearfix">
                                <li>
                                    Trẻ Em (Dưới 18 Tuổi) <span
                                        class="price">{{number_format($tourDetail->price_child)}}/người</span>
                                </li>
                                <li>
                                    Người Lớn (Trên 18 Tuổi) <span
                                        class="price">{{number_format($tourDetail->price_adult)}}/người</span>
                                </li>
                            </ul>
                            <hr class="mb-25">
                            <button type="submit" class="theme-btn style-two w-100 mt-15 mb-5">
                                <span data-hover="Đặt Ngay">Đặt Ngay</span>
                                <i class="fal fa-arrow-right"></i>
                            </button>
                            <div class="text-center">
                                <a href="{{route('contact')}}">Bạn Cần Sự Giúp Đỡ?</a>
                            </div>
                        </form>
                    </div>

                    <div class="widget widget-contact" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h5 class="widget-title">Need Help?</h5>
                        <ul class="list-style-one">
                            <li><i class="far fa-envelope"></i> <a
                                    href="emilto:helpxample@gmail.com">helpxample@gmail.com</a></li>
                            <li><i class="far fa-phone-volume"></i> <a href="callto:+000(123)45688">+000 (123) 456
                                    88</a></li>
                        </ul>
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
                        <div class="cta-shape"><img src="assets/images/widgets/cta-shape3.png" alt="Shape"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tour Details Area end -->


<!-- Newsletter Area start -->
<section class="newsletter-three bgc-primary py-100 rel z-1"
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
</section>
<!-- Newsletter Area end -->


<!-- Newsletter Area end -->
@include('client.blocks.footer');