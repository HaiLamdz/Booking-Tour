@extends('admin.layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                    test.
                </div> --}}

                <div class="col-sm-2 col-2" style="margin-left: 75%; margin-top: 20px">
                    <form action="{{route('update_booking', $bookingTour->booking_id)}}" method="POST">
                        @csrf
                        <select style="color: black;" name="booking_status" id="" class="form-control mb-1">
                            <option value="n" 
                            {{$bookingTour->booking_status == 'n' ? 'selected' : ''}}
                            {{ in_array($bookingTour->booking_status, ['Y', 'p', 'f', 'c']) ? 'disabled' : '' }}
                                >Đang xử lý</option>
                            <option value="Y" 
                            {{$bookingTour->booking_status == 'Y' ? 'selected' : ''}}
                            {{ in_array($bookingTour->booking_status, [ 'p', 'f', 'c']) ? 'disabled' : '' }}
                                >Đã xác nhận</option>
                            <option value="p" 
                            {{$bookingTour->booking_status == 'p' ? 'selected' : ''}}
                            {{ in_array($bookingTour->booking_status, ['f', 'c']) ? 'disabled' : '' }}
                            >Chuẩn bị khởi hành</option>
                            <option value="f" 
                            {{$bookingTour->booking_status == 'f' ? 'selected' : ''}}
                            {{ in_array($bookingTour->booking_status, ['c']) ? 'disabled' : '' }}
                            >Đã hoàn thành</option>
                            <option value="c" 
                            {{$bookingTour->booking_status == 'c' ? 'selected' : ''}} 
                            >Đã hủy</option>
                        </select>
                        <div class="card">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- Main content -->
                <div class="card" style="margin-top: 30px">
                    <div class="card-body">
                        <div class="card-header">
                            <h2>Chi Tiết Tour</h2>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> HaiLam Tour
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Thông tin người đặt tour:
                                    <address>
                                        <strong>{{$bookingTour->fullName}}</strong><br>
                                        Email: {{$bookingTour->email}}<br>
                                        Sđt: {{$bookingTour->phoneNumber}}<br>
                                        Địa chỉ: {{$bookingTour->address}}<br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Tài khoản đặt tour:
                                    <address>
                                        <strong>{{$bookingTour->user_name}}</strong><br>
                                        Sđt: {{$bookingTour->user_phone ?? 'chưa cập nhập'}} <br>
                                        Địa chỉ: {{$bookingTour->user_address}}<br>
                                    </address>
                                </div>
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>Mã Tour</th>
                                                <th>Tour</th>
                                                <th>Số người lớn</th>
                                                <th>Số trẻ em</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$bookingTour->tour_code}}</td>
                                                <td style="width: 500px;">{{$bookingTour->title}}</td>
                                                <td>{{$bookingTour->num_adult}} người</td>
                                                <td>{{$bookingTour->num_child}} người</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Ngày đặt: {{date('d/m/Y', strtotime($bookingTour->booking_date))}}
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Phương thức thanh toán:</th>
                                                <td>
                                                    @if ($bookingTour->payment_method === 'office_payment')
                                                    Thanh Toán Tại Văn Phòng
                                                    @elseif($bookingTour->payment_method === 'momo_payment')
                                                    Thanh Toán Bằng Momo
                                                    @else
                                                    Thanh Toán VNPay
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Trạng thái thanh toán:</th>
                                                <td>
                                                    @if ($bookingTour->payment_status === 'n')
                                                    Chưa Thanh Toán
                                                    @else
                                                    Đã Thanh Toán
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{number_format($bookingTour->total_price)}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection