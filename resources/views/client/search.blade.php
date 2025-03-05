@include('client.blocks.header')
@include('client.blocks.nav')
<!-- Page Banner Start -->
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover"
    style="background-image: url({{asset('FE/assets/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="banner-inner text-white mb-50">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Tour</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tìm Kiếm Tour</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->

<section class="tour-grid-page py-100 rel z-2">
    <div class="container">
        <div class="shop-shorter rel z-3 mb-20">
            <select>
                <option value="default" selected="">Sắp Xếp theo</option>
                <option value="new">Mới Nhất</option>
                <option value="old">Cũ Nhất</option>
                <option value="hight-to-low">Cao Đến Thấp</option>
                <option value="low-to-high">Thất Đến Cao</option>
            </select>
        </div>
        <hr class="mb-50">
        <div class="row">
            @foreach ($tours as $item)
            <div class="col-xl-4 col-md-6">
                <div class="destination-item tour-grid style-three bgc-lighter" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    <div class="image">
                        <span class="badge bgc-pink">Nổi Bật</span>
                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                        <img src="{{(asset('upload/tours/' . $item->image))}}" alt="Tour List">
                    </div>
                    <div class="content">
                        <div class="destination-header">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> {{ $item->destination}}</span>
                        </div>
                        <h5><a href="{{route('tour_detail', $item->tour_id)}}">{{$item->title}}</a></h5>
                        <p>{!!mb_strimwidth(strip_tags($item->description), 0, 100, '...')!!}</p>
                        <ul class="blog-meta">
                            <li><i class="far fa-clock"></i>{{$item->duration}}</li>
                            <li><i class="far fa-user"></i>{{$item->quantity}}</li>
                        </ul>
                        <div class="destination-footer"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                            <div class="price-wrapper" style="display: flex; flex-direction: column">
                                <span class="price"><span>{{number_format($item->price_adult)}}</span>/Người Lớn</span>
                                <span class="price"><span>{{number_format($item->price_child)}}</span>/Trẻ Em</span>
                            </div>
                            <a href="{{route('tour_detail', $item->tour_id)}}" class="theme-btn style-two style-three"
                                style="white-space: nowrap;">
                                <span data-hover="Book Now">Book Now</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <ul class="pagination justify-content-center pt-15 flex-wrap" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
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

@include('client.blocks.footer')