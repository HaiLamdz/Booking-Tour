<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="custom-loader"></div>
        </div>

        <!-- main header -->
        <header class="main-header header-one white-menu menu-absolute ">
            <!--Header-Upper-->
            <div class="header-upper py-30 rpy-0">
                <div class="container-fluid clearfix">

                    <div class="header-inner rel d-flex align-items-center">
                        <div class="logo-outer">
                            <div class="logo"><a href="index.html"><img
                                        src="{{asset('FE/assets/images/logos/logo.png')}}" alt="Logo" title="Logo"></a>
                            </div>
                        </div>

                        <div class="nav-outer mx-lg-auto ps-xxl-5 clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <div class="mobile-logo">
                                        <a href="index.html">
                                            <img src="{{asset('FE/assets/images/logos/logo.png')}}" alt="Logo"
                                                title="Logo">
                                        </a>
                                    </div>

                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-bs-toggle="collapse"
                                        data-bs-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{route('home')}}">Trang Chủ</a></li>
                                        <li><a target="_blank" href="{{route('about')}}">Giới Thiệu</a></li>
                                        <li ><a href="{{route('tour')}}">Tours</a></li>
                                        <li><a href="{{route('destination')}}">Điểm Đến</a></li>
                                        <li class="dropdown"><a href="#">Trang</a>
                                            <ul>
                                                <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                                <li><a href="404.html">404 Error</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('new')}}">Tin Tức</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>

                        <!-- Nav Search -->
                        <div class="nav-search">
                            <button class="far fa-search"></button>
                            <form action="#" class="hide">
                                <input type="text" placeholder="Search" class="searchbox" required="">
                                <button type="submit" class="searchbutton far fa-search"></button>
                            </form>
                        </div>

                        <!-- Menu Button -->
                        <div class="menu-btns py-10">
                            <a href="{{route('tour')}}" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Book Now">Book Now</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            <!-- menu sidbar -->
                            <div class="menu">
                                <button class="bg-transparent ">
                                    <span class="icon">
                                        <svg width="30" height="30" viewBox="0 0 64 64">
                                            <circle cx="32" cy="20" r="12" fill="white"></circle>
                                            <path d="M10 54c0-12 20-18 22-18s22 6 22 18v4H10v-4z" fill="white"></path>
                                        </svg>
                                    </span>
                                    <div class="dropdownn">
                                        @if (session()->has('email') )
                                            <a href="#"><p>{{session()->get('email')}}</p></a>
                                            <a href="{{route('info')}}">Thông Tin Cá Nhân</a>
                                            <a href="{{route('my_tour')}}">Tuor Đã Đặt</a>
                                            <a href="{{route('logout')}}">Đăng Xuất</a>
                                        @else
                                            <a href="{{route('loginn')}}">Đăng nhập</a>
                                            <a href="{{route('sign_up')}}">Đăng ký</a>
                                        @endif
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
        <style>
            .dropdownn {
                position: absolute;
                top: 70px;
                right: -10px;
                background-color: #333;
                padding: 10px;
                border-radius: 8px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s, visibility 0.3s;
            }

            /* Hiển thị menu khi hover */
            .bg-transparent:hover .dropdownn {
                opacity: 1;
                visibility: visible;
            }

            .dropdownn a {
                display: block;
                text-decoration: none;
                color: white;
                padding: 8px 12px;
                border-radius: 4px;
                transition: background 0.3s;
            }

            .dropdownn a:hover {
                background-color: #555;
            }
        </style>

        <!--Form Back Drop-->
        <div class="form-back-drop"></div>