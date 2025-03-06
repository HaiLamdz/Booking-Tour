@include('client.blocks.header')
@include('client.blocks.nav')
<!-- Hero Area Start -->
<section class="hero-area bgc-black pt-200 rpt-120 rel z-2">
    <div class="container-fluid">
        <h1 class="hero-title" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">tour
            & Travel</h1>
        <div class="main-hero-image bgs-cover"
            style="background-image: url({{asset('FE/assets/images/hero/hero.jpg')}});"></div>
    </div>
    <form action="{{ route('search') }}" method="GET">
        <div class="container container-1400">
            <div class="search-filter-inner">
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                    <span class="title">Điểm Đến</span>
                    <select name="city">
                        <option value="">Chọn Thành Phố or Khu Vực</option>
                        @foreach ($tours as $item)
                        <option value="{{$item->destination}}">{{$item->destination}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                    <span class="title">Ngày Khởi Hành</span>
                    <input type="date" name="start_date">
                </div>
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                    <span class="title">Ngày Kết Thúc</span>
                    <input type="date" name="end_date">
                </div>
                <div class="search-button">
                    <button class="theme-btn" type="submit">
                        <span>Tìm kiếm</span>
                        <i class="far fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

</section>
<!-- Hero Area End -->


<!-- Destinations Area start -->
<section class="destinations-area bgc-black pt-100 pb-70 rel z-1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-white text-center counter-text-wrap mb-70" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    <h2>Discover the World's Treasures with Ravelo</h2>
                    <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most popular
                        experience you’ll remember</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($tours as $tour)
            <div class="col-xxl-3 col-xl-4 col-md-6">
                <div class="destination-item hhh" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                        <img style="" src="{{(asset('upload/tours/' . $tour->image))}}" alt="Destination">
                    </div>
                    <div class="content">
                        <span class="location"><i class="fal fa-map-marker-alt"></i>{{$tour->destination}}</span>
                        <h6><a href="{{route('tour_detail', $tour->tour_id)}}"> {{$tour->title}} </a></h6>
                        <span class="time">{{$tour->duration}}</span>
                    </div>
                    <div class="destination-footer">
                        <span class="price">{{number_format($tour->price_adult)}}/người</span>
                        <a href="{{route('tour_detail', $tour->tour_id)}}" class="read-more">Book Now <i
                                class="fal fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Destinations Area end -->
<!-- Popular Destinations Area start -->
<section class="popular-destinations-area rel z-1">
    <div class="container-fluid">
        <div class="popular-destinations-wrap br-20 bgc-lighter pt-100 pb-70">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2>Điểm Đến Nổi Bật</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($destinations as $item)
                    <div class="col-xl-3 col-md-6">
                        <div class="destination-item style-two">
                            <div class="">
                                <img src="{{asset('upload/tours/' . $item->image)}}" alt="Destination">
                            </div>
                            <div class="content">
                                <span class="time">{{$item->destination}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Destinations Area end -->




<!-- CTA Area start -->
<section class="cta-area pt-100 rel z-1">
    <div class="container-fluid">
        <div class="row">
            @foreach ($categories as $item)
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-duration="1500" data-aos-offset="50">
                <div class="cta-item" style="background-image: url({{asset('upload/categories/' . $item->image)}});">
                    <h2>{{$item->title}}</h2>
                    <a href="{{route('tour_cate', $item->cate_id)}}" class="theme-btn style-two bgc-secondary">
                        <span data-hover="Khám Phá Tour">Khám Phá Tour</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- CTA Area end -->


<!-- Blog Area start -->
<section class="blog-area py-70 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    <h2>Tin Tức Mới Nhất</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($news as $item)
            <div class="col-xl-4 col-md-6">
                <div class="blog-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image" >
                        <img style="border-radius: 5%;" src="{{asset('upload/news/' . $item->image)}}" alt="Blog">
                    </div>
                    <div class="content">
                        <a href="blog.html" class="category">Travel</a>
                        <h6><a class="" href="{{route('new_detail' , $item->new_id)}}">{{$item->title}}</a></h6>
                        <ul class="blog-meta">
                            <li><i class="far fa-calendar-alt"></i> {{date('d-m-Y', strtotime($item->created_at))}}</li>
                            <li><a href="{{route('new_detail' , $item->new_id)}}" class="read-more">
                                <span data-hover="Đọc Thêm">Đọc Thêm</span>
                                <i class="fal fa-arrow-right"></i>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Area end -->


<!-- footer area start -->
@include('client.blocks.footer')