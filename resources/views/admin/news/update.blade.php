@extends('admin.layouts.app')
@section('content')

<div class="col-md-12 mt-5 ">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Update News</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="{{route('news.update', $new->new_id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$new->title}}"/>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" />
                    <img width="150px" height="auto" src="{{asset('upload/news/' . $new->image)}}" alt="">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="noi_dung"  rows="10" cols="50" name="content" rows="3">{{$new->content}}</textarea>
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>

    @endsection