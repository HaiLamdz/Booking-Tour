@include('client.blocks.header')
@include('client.blocks.nav')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
</head>

<body>
    <div style="margin-top: 150px">
        <hr>
    </div>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <form action="{{route('update_avata')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">Ảnh Đại Diện</div>
                        <div class="card-body text-center">

                            <img id="img" class="img-account-profile rounded-circle mb-2"
                                src="{{asset('upload/avatas/' . $user->avata)}}" alt="Ảnh đại diện">
                            <input id="input" type="file" name="avata">
                            <div class="small font-italic text-muted mb-4">JPG or PNG không được quá 5 MB</div>

                            <button class="btn btn-primary" type="submit">Cập Nhập Avata Mới</button>
                        </div>
                    </form>
                    <div class="card-body text-center" style="background-color: grey; margin-top: 10px;">
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Mật khẩu hiện tại</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Nhập mật khẩu cũ"
                                value="">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Mật khẩu mới</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Nhập mật khẩu mới"
                                value="">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Xác nhận mật khẩu</label>
                            <input class="form-control" id="inputUsername" type="text"
                                placeholder="Nhập lại mật khẩu mới" value="">
                        </div>

                        <button class="btn btn-primary" type="button">Thay Đổi Tài Khoản</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card mb-4">
                    <div class="card-header">Chi Tiết Tài Khoản</div>
                    <div class="card-body">
                        <form action="{{route('update_user')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Họ Và Tên</label>
                                <input class="form-control" name="name" id="inputUsername" type="text"
                                    placeholder="Nhập Họ Và Tên" value="{{$user->user_name}}">
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Số Điện Thoại:</label>
                                    <input class="form-control" name="phone" id="inputOrgName" type="text"
                                        placeholder="Nhập Số Điện Thoại" value="{{$user->user_phone}}">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Địa Chỉ</label>
                                    <input class="form-control" name="address" id="inputLocation" type="text"
                                        placeholder="Nhập Địa Chỉ" value="{{$user->user_address}}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control" name="email" id="inputEmailAddress" type="email"
                                    placeholder="Nhập Email" value="{{$user->email}}">
                            </div>

                            <button class="btn btn-primary" type="submit">Lưu Thay Đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="{{asset('FE/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('FE/assets/js/script.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- jQuery & jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        const img = document.querySelector('#img');
        const input = document.querySelector('#input');
    
        input.addEventListener("change", () => {
            img.src = URL.createObjectURL(input.files[0])
        })
    </script>