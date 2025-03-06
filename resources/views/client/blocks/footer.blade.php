<footer class="main-footer bgs-cover overlay rel z-1 pb-25" style="background-image: url({{asset('FE/assets/images/backgrounds/footer.jpg')}});">
    <div class="container">
        <div class="footer-top pt-100 pb-30">
        </div>
    </div>
</footer>
<!-- footer area end -->

</div>
<!--End pagewrapper-->


<!-- Jquery -->
<script src="{{asset('FE/assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('FE/assets/js/bootstrap.min.js')}}"></script>
<!-- Appear Js -->
<script src="{{asset('FE/assets/js/appear.min.js')}}"></script>
<!-- Slick -->
<script src="{{asset('FE/assets/js/slick.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('FE/assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Nice Select -->
<script src="{{asset('FE/assets/js/jquery.nice-select.min.js')}}"></script>
<!-- Image Loader -->
<script src="{{asset('FE/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- Skillbar -->
<script src="{{asset('FE/assets/js/skill.bars.jquery.min.js')}}"></script>
<!-- Isotope -->
<script src="{{asset('FE/assets/js/isotope.pkgd.min.js')}}"></script>
<!--  AOS Animation -->
<script src="{{asset('FE/assets/js/aos.js')}}"></script>
<!-- Custom script -->
<script src="{{asset('FE/assets/js/script.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- jQuery & jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  AOS.init();
</script>
<script>
$(document).ready(function() {
    // Kiểm tra xem element có tồn tại không
    if ($('.price-slider-range').length) {
        $(".price-slider-range").slider({
            range: true,
            min: 10000,        // Giá trị tối thiểu
            max: 30000000,     // Giá trị tối đa
            values: [5000000, 25000000], // Giá trị ban đầu, đảm bảo value[1] <= max
            step: 10000,       // Bước nhảy (tùy chọn)
            slide: function(event, ui) {
                $("#price").val(
                    ui.values[0].toLocaleString("vi-VN") + " VNĐ - " +
                    ui.values[1].toLocaleString("vi-VN") + " VNĐ"
                );
            }
        });

        // Khởi tạo giá trị ban đầu
        $("#price").val(
            $(".price-slider-range").slider("values", 0).toLocaleString("vi-VN") + " - " +
            $(".price-slider-range").slider("values", 1).toLocaleString("vi-VN") + " VNĐ"
        );
    }
});
</script>

</body>

<!-- Mirrored from webtendtheme.net/html/2024/ravelo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:27:04 GMT -->
</html>