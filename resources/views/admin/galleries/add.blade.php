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
        <form action="{{route('galleries.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="title" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image[]" multiple class="form-control" id="inputGroupFile02" />
                    @error('image')
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
                <h3 class="card-title">List Gallery</h3>
            </div>
            <!--end::Form-->
            <table class="table table-bordered" id="myTable" style="text-align: center">
                <thead>
                    <tr>
                        <th style="width: 10px" scope="col">STT</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $key => $value)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                                <td><img width="150px" height="auto" src="{{asset('upload/galleries/' . $value->image_URL)}}"
                                        alt=""></td>
                                {{-- <td>{{$value->image}}</td> --}}
                                <td>{{$value->description}}</td>
                        <td>
                            <form action="{{route('galleries.destroy', $value->image_id)}}"
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