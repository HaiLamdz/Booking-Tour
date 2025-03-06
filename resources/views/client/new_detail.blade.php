@include('client.blocks.header')
@include('client.blocks.nav')
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover"
    style="background-image: url({{asset('FE/assets/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="banner-inner text-white">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Chi Tiết Tin
                Tức</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Chi Tiết Tin tức</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="blog-detaisl-page py-100 rel z-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <a href="blog.html" class="category">Travel</a>
                    <h2>{{$new->title}}</h2>
                    <p>{!! $new->content !!}</p>
                </div>

                <hr class="mb-45">

            </div>
            <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                <div class="blog-sidebar">
                    <div class="widget widget-news" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h5 class="widget-title">Tin Tức Mới Nhất</h5>
                        <ul>
                            @foreach ($news as $item)
                            <li>
                                <div class="image">
                                    <img src="{{asset('upload/news/' . $item->image)}}" alt="News">
                                </div>
                                <div class="content">
                                    <h6><a href="{{route('new_detail', $item->new_id)}}">{{$item->title}}</a></h6>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('client.blocks.footer')