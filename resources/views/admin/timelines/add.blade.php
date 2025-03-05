@extends('admin.layouts.app')
@section('content')

<div class="col-md-12 mt-5 ">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Insert Galleries</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="{{route('timelines.store')}}" method="POST" >
            <!--begin::Body-->
            @csrf
            <div class="card-body">
                <input type="hidden" name="tour_id" value="{{$tour->tour_id}}">
                <div class="mb-3">
                    <label for="title" class="form-label">Tour</label>
                    <input type="text" name="title" disabled value="{{$tour->title}}" class="form-control"
                        id="exampleInputEmail1" />
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Description</label>
                    <textarea class="form-control" id="noi_dung" name="description" rows="10"></textarea>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!--end::Footer-->
        </form>
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">List Schedule</h3>
            </div>
            <!--end::Form-->
            <table class="table table-bordered" id="myTable" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 10px" scope="col">STT</th>
                        <th scope="col">Day</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeLine as $key => $value)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$value->title}}</td>
                                {{-- <td>{{$value->image}}</td> --}}
                                <td>{!! mb_strimwidth(strip_tags($value->description), 0, 300, '...') !!}</td>
                        <td>
                            <form action="{{route('timelines.destroy', $value->timeLine_id)}}"
                                onsubmit="return confirm('Bạn Chắc Chắn muốn Xóa Chứ?')" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection