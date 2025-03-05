<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h3>Xin Chào {{$customer->user_name}}</h3>
        <p>Đăng Ký Tài Khoản Tại Hải Lam Tour Thành Công</p>
        <p>Vui Lòng Xác Nhận Để Kích Hoạt Tài Khoản</p>
        <p>
            <a href="{{route('active_account', ['customer' => $customer->user_id, 'token' => $customer->token])}}" 
            style="display:inline-block; background: green; color: #fff;padding: 7px 25px; font-weight: bold">
                Xác Nhận Tài Khoản
            </a>
        </p>
    </div>
</div>