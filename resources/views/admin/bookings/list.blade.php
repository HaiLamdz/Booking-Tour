@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">List Booking</h3>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-bordered" id="myTable" style="text-align: center">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">STT</th>
                                <th scope="col">Tour</th>
                                <th scope="col">Tên người đặt</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $key=> $item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td style="width: 400px;">{{$item->title}}</td>
                                <td>{{$item->fullName}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phoneNumber}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{number_format($item->total_price)}} vnđ</td>
                                <td>
                                    @if ($item->booking_status === 'n')
                                    <span class="badge  bg-warning">Đang Xử Lý</span>
                                    @elseif($item->booking_status === 'f')
                                    <span class="badge  bg-success">Đã Hoàn Thành</span>
                                    @elseif($item->booking_status === 'Y')
                                    <span class="badge  bg-info">Đã xác Nhận</span>
                                    @elseif($item->booking_status === 'p')
                                    <span class="badge  bg-danger">Chuẩn Bị Khởi Hành</span>
                                    @else
                                    <span class="badge  bg-secondary">Đã Hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('bookings.edit', $item->booking_id)}}"><button class="btn btn-info">Chi tiết</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection