@include('client.blocks.header')
@include('client.blocks.nav')
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url({{asset('FE/assets/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="banner-inner text-white mb-50">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Destination 02</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Điểm Đến</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="popular-destinations-area pt-100 pb-90 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Điểm Đến Phổ Biến</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gap-10 destinations-active justify-content-center">
                @foreach ($tours as $item)
                <div class="col-xl-3 col-md-6 item recent rating">
                    <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{asset('upload/tours/' . $item->image)}}" alt="Destination">
                        </div>
                        <div class="content">
                            <h6><a href="#">{{$item->destination}}</a></h6>
                            <span class="time">{{$item->destination}}</span>
                            <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Popular Destinations Area end -->



@include('client.blocks.footer')
