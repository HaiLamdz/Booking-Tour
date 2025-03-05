@include('client.blocks.header')
@include('client.blocks.nav')
<!-- Page Banner Start -->
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover"
    style="background-image: url({{asset('FE/assets/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="banner-inner text-white mb-50">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Tour Đã đặt
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tour Đã đặt</li>
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



                </div>

            </div>
            <div class="col-lg-9">
                @foreach ($tours as $item)
                <div class="destination-item style-three bgc-lighter" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="image">
                        @if ($item->booking_status === 'n')
                        <span class="badge bgc-warning">Đang Xử Lý</span>
                        @elseif($item->booking_status === 'f')
                        <span class="badge bgc-success">Đã Hoàn Thành</span>
                        @elseif($item->booking_status === 'Y')
                        <span class="badge bgc-info">Đã xác Nhận</span>
                        @elseif($item->booking_status === 'p')
                        <span class="badge bgc-danger">Chuẩn Bị Khởi Hành</span>
                        @else
                        <span class="badge bgc-secondary">Đã Hủy</span>
                        @endif
                        <a href="" class="heart"><i class="fas fa-heart"></i></a>
                        <img src="{{asset('upload/tours/' . $item->image)}}" alt="Tour List">
                    </div>
                    <div class="content">
                        <div class="destination-header">
                            <span class="location"><i class="fal fa-map-marker-alt"></i>{{$item->destination}}</span>
                            <div class="ratting">
                                @for ($i = 0; $i < 5; $i++) @if (($item->rating && $i < $item->rating))
                                        <i class="fas fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                            </div>
                        </div>
                        <h5><a href="{{route('tour_booked', $item->booking_id)}}">{{$item->title}}</a></h5>
                        <p>{!!mb_strimwidth(strip_tags($item->description), 0, 150, '...')!!}</p>
                        <ul class="blog-meta">
                            <li><i class="far fa-clock"></i>{{$item->duration}}</li>
                            <li><i class="far fa-user"></i>{{$item->num_adult}} người lớn</li>
                            <li><i class="far fa-user"></i>{{$item->num_child}} trẻ em</li>
                        </ul>
                        <div class="destination-footer"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                            <div class="price-wrapper" style="display: flex; flex-direction: column">
                                <span class="price"><span>{{number_format($item->total_price)}}</span>vnđ</span>
                            </div>
                            @if ($item->booking_status === 'f')
                            <a href="{{route('tour_detail', ['id' => $item->tour_id])}}"
                                class="theme-btn style-two style-three" style="white-space: nowrap;">
                                @if ($item->rating)
                                <span data-hover="Đã Đánh Giá">Đã Đánh Giá</span>
                                @else
                                <span data-hover="Đánh Giá">Đánh Giá</span>
                                @endif
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            @endif
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Tour List Area end -->


@include('client.blocks.footer')