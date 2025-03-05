@include('client.blocks.header')
@include('client.blocks.nav')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    /* Layout */
    .checkout-container {
        max-width: 1200px;
        margin: auto;
        padding-top: 20px;
        display: flex;
        gap: 24px;
    }

    .checkout-container {
        .checkout__infor {
            background-color: #F6F8FA;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: none;
            gap: 16px;
            padding: 30px;
        }

        .checkout-info {
            flex: 1;
        }

        .checkout-summary {
            width: 400px;
        }

        /* Header */
        .checkout-header {
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 700;
        }

        /* Form Styling */

        .checkout__infor .form-group label {
            font-weight: 600;
            font-size: 1rem;
        }

        .checkout__infor .form-group input {
            width: 100%;
            height: 56px;
            padding: 16px 17px;
            font-size: 1rem;
            border: 0px solid #E2E4E5;
            border-radius: 5px;
        }

        /* Quantity Selector */
        .checkout__quantity {
            display: flex;
            gap: 24px;
        }

        .quantity-selector {
            width: 50%;
            display: flex;
            align-items: center;
            border: 1px solid #E2E4E5;
            padding: 20px;
            justify-content: space-between;
            gap: 48px;
        }

        .input__quanlity {
            display: flex;
            gap: 16px;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            border: 2px solid #63AB45;
            color: #63AB45;
        }

        .quantity-input {
            padding: 0;
            width: 30px;
            text-align: center;
            border: none;
            font-size: 24px;
            line-height: 1;
            letter-spacing: 0em;
            font-weight: 500;
            color: #63AB45;
        }

        /* Payment Options */
        .payment-option {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #E2E4E5;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .payment-option img {
            width: 40px;
        }

        /* Privacy Agreement */
        .privacy-section {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #F9F9F9;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
            text-align: center;
        }

        .privacy-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            justify-content: center;
        }

        /* Order Summary */
        .order-summary {
            border-top: 1px solid #D6D6D6;
            margin-top: 20px;
            padding-top: 20px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total-price,
        .quantity_children,
        .quantity_adult {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .order-discount {
            border-top: 1px solid #D6D6D6;
            margin-top: 20px;
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        .order-discount input {
            border-radius: 8px;
            border: 1px solid #E2E4E5
        }

        /* Button */
        .checkout-btn {
            width: 100%;
            padding: 15px;
            background-color: #ff6a07;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-btn-n {
            width: 100%;
            padding: 15px;
            background-color: #d2a587;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .summary-section {
            padding: 16px;
            box-shadow: 10px 10px 36px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 50px;
        }

        .btn-booking.inactive {
            background-color: #d2a587;
            cursor: not-allowed;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .checkout-container {
            flex-direction: column;
        }

        .checkout-summary {
            width: 100%;
            margin-top: 20px;
        }
    }
</style>
<div style="margin-top: 150px">
    <hr>
</div>
<section class="container">
    <h1 class="text-center checkout-header">{{$data->title}}</h1>

    <div class="checkout-container">
        <!-- Contact Information -->
        @csrf
        <div class="checkout-info">
            <h2 class="checkout-header">Thông Tin Liên Lạc</h2>
            <div class="checkout__infor">
                <div class="form-group">
                    <label for="username">Họ và tên*</label>
                    <input type="text" id="username" placeholder="Nhập Họ và tên" value="{{$data->fullName}}"
                        name="fullName" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" placeholder="sample@gmail.com" value="{{$data->email}}" name="email"
                        disabled>
                </div>

                <div class="form-group">
                    <label for="tel">Số điện thoại*</label>
                    <input type="tel" id="tel" placeholder="Nhập số điện thoại liên hệ" value="{{$data->phoneNumber}}"
                        name="phoneNumber" disabled>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ*</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ liên hệ" value="{{$data->address}}"
                        name="address" disabled>
                </div>
            </div>


            <!-- Passenger Details -->
            <h2 class="checkout-header mt-4">Hành Khách</h2>

            <div class="checkout__quantity">
                <div class="form-group quantity-selector">
                    <label>Người lớn:</label>
                    <div class="input__quanlity">
                        <input type="number" name="numAdult" class="quantity-input" value="{{$data->num_adult}}"
                            disabled>
                    </div>
                </div>

                <div class="form-group quantity-selector">
                    <label>Trẻ em:</label>
                    <div class="input__quanlity">
                        <input type="number" name="numChild" class="quantity-input" value="{{$data->num_child}}"
                            disabled>
                    </div>
                </div>
            </div>
            <!-- Payment Method -->
            <h2 class="checkout-header">Phương Thức Thanh Toán</h2>

            <label class="payment-option">
                <input type="radio" {{$data->payment_method === 'office_payment' ? 'checked' : ''}} name="payment"
                value="office_payment" disabled>
                Thanh toán tại văn phòng
            </label>

            <label class="payment-option">
                <input type="radio" {{$data->payment_method === 'paypal_payment' ? 'checked' : ''}} name="payment"
                value="paypal_payment" disabled>
                Thanh toán bằng PayPal
            </label>

            <label class="payment-option">
                <input type="radio" name="payment" {{$data->payment_method === 'momo_payment' ? 'checked' : ''}}
                value="momo_payment" disabled>
                Thanh toán bằng Momo
            </label>


        </div>

        <!-- Order Summary -->
        <div class="checkout-summary">
            <div class="summary-section">
                <div>
                    @if ($data->booking_status === 'n')
                    <button class="btn btn-warning">Đang Xử Lý</button>
                    @elseif($data->booking_status === 'f')
                    <button class="btn btn-success">Đã Hoàn Thành</button>
                    @elseif($data->booking_status === 'Y')
                    <button class="btn btn-info">Đã xác Nhận</button>
                    @elseif($data->booking_status === 'p')
                    <button class="btn btn-danger">Chuẩn Bị Khởi Hành</button>
                    @else
                    <button class="btn btn-secondary">Đã Hủy</button>
                    @endif
                    <hr>
                    <p>Mã tour : {{$data->tour_code}}</p>
                    <p>Thời gian: {{$data->duration}}</p>
                    <p>Ngày khởi hành: {{date('d/m/Y', strtotime($data->start_date))}}</p>
                    <p>Ngày kết thúc: {{date('d/m/Y', strtotime($data->end_date))}}</p>
                </div>

                <div class="order-summary">
                    <div class="summary-item">
                        <span>Người lớn:</span>
                        <div>
                            <span class="quantity_adult">{{$data->num_adult}}</span>
                            <span>x</span>
                            <span class="total-price">{{number_format($data->price_adult)}}</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <span>Trẻ em:</span>
                        <div>
                            <span class="quantity_children">{{$data->num_adult}}</span>
                            <span>x</span>
                            <span class="total-price">{{number_format($data->price_child)}}</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <span>Giảm Giá:</span>
                        <div>
                            <span class="total-price">0 VNĐ</span>
                        </div>
                    </div>

                    <div class="summary-item total-price">
                        <span>Tổng cộng:</span>
                        <span>{{number_format($data->total_price)}}VNĐ</span>
                    </div>
                    <input type="hidden" name="total_price" id="total_price">
                </div>
                <div class="order-discount">
                </div>
                <p align="center">Tour chỉ được hủy khi trạng thái tour là <strong>Đang Xử Lý</strong></p>
                <form action="{{route('cancel_booking', $data->booking_id)}}" method="post">
                    @csrf
                    @if ($data->booking_status === 'n')
                    <input type="hidden" value="c" name="booking_status">
                    <button type="submit" class="checkout-btn" style="width: 50%; margin-left: 25%;">Hủy Tour</button>
                    @else
                    <input type="submit" class="checkout-btn-n" style="width: 50%; margin-left: 25%;" value="Hủy Tour"
                        disabled>
                    @endif

                </form>
            </div>
        </div>
    </div>
</section>
</body>

</html>
<script src="{{asset('FE/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('FE/assets/js/script.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- jQuery & jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>