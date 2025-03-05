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
            border-bottom: 1px solid #D6D6D6;
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
    <h1 class="text-center checkout-header">Tổng Quan Về Chuyến Đi</h1>

    <form action="{{route('submit_booking', ['id' => $tour->tour_id])}}" method="post" id="booking-form" class="checkout-container">
        <!-- Contact Information -->
        @csrf
        <div class="checkout-info">
            <h2 class="checkout-header">Thông Tin Liên Lạc</h2>
            <div class="checkout__infor">
                <div class="form-group">
                    <label for="username">Họ và tên*</label>
                    <input type="text" id="username" placeholder="Nhập Họ và tên" name="fullName" required>
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" placeholder="sample@gmail.com" name="email" required>
                </div>

                <div class="form-group">
                    <label for="tel">Số điện thoại*</label>
                    <input type="tel" id="tel" placeholder="Nhập số điện thoại liên hệ" name="phoneNumber" required>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ*</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ liên hệ" name="address" required>
                </div>
            </div>


            <!-- Passenger Details -->
            <h2 class="checkout-header">Hành Khách</h2>

            <div class="checkout__quantity">
                <div class="form-group quantity-selector">
                    <label>Người lớn</label>
                    <div class="input__quanlity">
                        <button type="button" class="quantity-btn">-</button>
                        <input type="number" name="numAdult" class="quantity-input" value="1" min="1" id="numAdult"
                            data-price-adult={{$tour->price_adult}} readonly>
                        <button type="button" class="quantity-btn">+</button>
                    </div>
                </div>

                <div class="form-group quantity-selector">
                    <label>Trẻ em</label>
                    <div class="input__quanlity">
                        <button type="button" class="quantity-btn">-</button>
                        <input type="number" name="numChild" class="quantity-input" value="0" min="0" id="numChild"
                            data-price-child={{$tour->price_child}} readonly>
                        <button type="button" class="quantity-btn">+</button>
                    </div>
                </div>
            </div>
            <!-- Privacy Agreement Section -->
            <div class="privacy-section">
                <p>Bằng cách nhấp chuột vào nút "ĐỒNG Ý" dưới đây, Khách hàng đồng ý rằng các điều kiện điều khoản
                    này sẽ được áp dụng. Vui lòng đọc kỹ điều kiện điều khoản trước khi lựa chọn sử dụng dịch vụ của
                    Lửa Việt Tours.</p>
                <div class="privacy-checkbox">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree">Tôi đã đọc và đồng ý với <a href="#" target="_blank">Điều khoản thanh
                            toán</a></label>
                </div>
            </div>
            <!-- Payment Method -->
            <h2 class="checkout-header">Phương Thức Thanh Toán</h2>

            <label class="payment-option">
                <input type="radio" name="payment" value="office_payment" required>
                Thanh toán tại văn phòng
            </label>

            <label class="payment-option">
                <input type="radio" name="payment" value="vnpay_payment" required>
                Thanh toán bằng VnPay
            </label>

            <label class="payment-option">
                <input type="radio" name="payment" value="momo_payment" required>
                Thanh toán bằng Momo
            </label>


        </div>

        <!-- Order Summary -->
        <div class="checkout-summary">
            <div class="summary-section">
                <div>
                    <p>Mã tour : {{$tour->tour_code}}</p>
                    <h4>Tên Tour: {{$tour->title}}</h4>
                    <p>Ngày khởi hành: {{$tour->start_date}}</p>
                    <p>Ngày kết thúc: {{$tour->end_date}}</p>
                    <p class="quantityAvailable">Số chỗ còn nhận: {{$tour->quantity}}</p>
                </div>

                <div class="order-summary">
                    <div class="summary-item">
                        <span>Người lớn:</span>
                        <div>
                            <span class="quantity_adult">1</span>
                            <span>x</span>
                            <span class="total-price">100,000 VNĐ</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <span>Trẻ em:</span>
                        <div>
                            <span class="quantity_children">0</span>
                            <span>x</span>
                            <span class="total-price">0 VNĐ</span>
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
                        <span>0 VNĐ</span>
                    </div>
                    <input type="hidden" name="total_price" id="total_price">
                </div>
                <div class="order-discount">
                    <input type="text" placeholder="Mã Giảm Giá" style="width: 65%">
                    <button style="width: 35%;" class="checkout-btn btn-discount">Áp Dụng</button>
                </div>
                <button type="submit" class="checkout-btn btn-booking">Xác Nhận và Thanh Toán</button>
            </div>
        </div>
    </form>
</section>
</body>

</html>

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
    let discount = 0;

    function updateSummary(){
        // lấy ra số lượng người lớn và trẻ em
        const numAdult = parseInt($("#numAdult").val());
        const numChild = parseInt($("#numChild").val());

        // lấy giá trị thuộc tính từ data-price
        const adultPrice = parseInt($("#numAdult").data("price-adult"));
        const ChildPrice = parseInt($("#numChild").data("price-child"));

        // tính toán tổng giá trị cho người lớn và trẻ em
        const adultTotal = numAdult * adultPrice;
        const childTotal = numChild * ChildPrice;

        // cập nhập hiển thị số lượng và giá tiền cho từng loại
        $(".quantity_adult").text(numAdult);
        $(".quantity_children").text(numChild);
        $(".summary-item:nth-child(1) .total-price").text(
            adultPrice.toLocaleString() + " VNĐ"
        );
        $(".summary-item:nth-child(2) .total-price").text(
            childTotal.toLocaleString() + " VNĐ"
        );

        // tính tổng giá trị
        const totalPrice = adultTotal + childTotal - discount;
        $(".summary-item.total-price span:last").text(
            totalPrice.toLocaleString() + " VNĐ"
        );

        $("#total_price").val(totalPrice);
    }

    // tăng giám số lượng
    // Sự kiện tăng/giảm số lượng người lớn và trẻ em
    $(".quantity-selector").on("click", ".quantity-btn", function () {
        const input = $(this).siblings("input");
        const min = parseInt(input.attr("min"));
        let value = parseInt(input.val());
        const quantityAvailable = parseInt(
            $(".quantityAvailable").text().match(/\d+/)[0]
        ); // Lấy số chỗ còn nhận từ nội dung của .quantityAvailable

        // Lấy tổng số lượng người lớn và trẻ em
        const totalAdults = parseInt($("#numAdult").val());
        const totalChildren = parseInt($("#numChild").val());

        // Kiểm tra nút tăng hay giảm
        if ($(this).text() === "+") {
            // Kiểm tra nếu đang tăng số lượng người lớn
            if (input.attr("id") === "numAdult") {
                // Kiểm tra nếu tổng số người lớn và trẻ em không vượt quá số chỗ còn nhận
                if (totalAdults + totalChildren < quantityAvailable) {
                    value++;
                } else {
                    alert(
                        "Không thể thêm số người lớn vượt quá số chỗ còn nhận!"
                    ); // Thông báo nếu vượt quá
                }
            }
            // Kiểm tra nếu đang tăng số lượng trẻ em
            else if (input.attr("id") === "numChild") {
                // Kiểm tra nếu tổng số người lớn và trẻ em không vượt quá số chỗ còn nhận
                if (totalAdults + totalChildren < quantityAvailable) {
                    value++;
                } else {
                    alert(
                        "Không thể thêm số trẻ em vượt quá số chỗ còn nhận!"
                    ); // Thông báo nếu vượt quá
                }
            }
        } else if (value > min) {
            value--;
        }

        // Cập nhật số lượng vào input
        input.val(value);

        // Cập nhật lại tổng giá
        updateSummary();
    });

    // áp dụng mã giảm giá

    $(".btn-discount").on("click", function(){
        const discountCode = $(".order-discount input").val();

        // giả sử mã discount là GIAM10
        if(discountCode === "GIAM10"){
            discount = 0.1 * (parseInt($("#numAdult").val()) * $("#numAdult").data("price-adult") + 
                             parseInt($("#numChild").val()) * $("#numChild").data("price-child"));
            toastr.success("Áp dụng mã thành công!");
        }else{
            discount = 0;
            toastr.error("Mã giảm giá không đúng!");
        }
        
        $(".summary-item:nth-child(3) .total-price").text(
            discount.toLocaleString() + " VNĐ"
        );

        updateSummary();
    });


    $("#agree").on("change", function(){
        toggleButtonState();
    })

    // hàm thay đổi trạng thái của nút
    function toggleButtonState(){
        if($("#agree").is(":checked")){
            $(".btn-booking").removeClass("inactive").css("pointer-events", "auto");
        }else{
            $(".btn-booking").addClass("inactive").css("pointer-events", "auto");
        }
    }
    

    updateSummary();
    toggleButtonState();
</script>

{{-- <script>
    // select phương thuecs thanh toán
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("booking-form");
        const paymentOptions = document.querySelectorAll("input[name='payment']");
        
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Ngăn chặn gửi form mặc định
            
            let selectedPayment = "";
            paymentOptions.forEach(option => {
                if (option.checked) {
                    selectedPayment = option.value;
                }
            });
    
            if (selectedPayment === "vnpay_payment") {
                // Chuyển hướng đến trang thanh toán VnPay
                window.location.href = "{{ route('vnpay_payment', ['id' => $tour->tour_id]) }}";
            } else {
                // Nếu không chọn VnPay, gửi form bình thường để thanh toán tại văn phòng
                form.submit();
            }
        });
    });
</script> --}}