@include('client.blocks.header')
@include('client.blocks.nav')
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover"
    style="background-image: url({{asset('FE/assets/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="banner-inner text-white">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Tin Tức</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Tin tức</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Blog List Area start -->
<section class="blog-list-page py-100 rel z-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($news as $item)
                <div class="blog-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" >
                    <div class="image">
                        <img style="border-radius: 5%;" src="{{asset('upload/news/' . $item->image)}}" alt="Blog List">
                    </div>
                    <div class="content">
                        <a href="blog.html" class="category">Travel</a>
                        <h5><a href="{{route('new_detail', $item->new_id)}}">{{$item->title}}</a></h5>
                        <p>{!!mb_strimwidth(strip_tags($item->content), 0, 150, '...')!!}</p>
                        <a href="{{route('new_detail', $item->new_id)}}" class="theme-btn style-two style-three">
                            <span data-hover="Đọc Thêm">Đọc Thêm</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('client.blocks.footer')