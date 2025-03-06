@extends('admin.layouts.app')
@section('content')

<div class="col-md-12 mt-5 ">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Create New</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
            <!--begin::Body-->
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="noi_dung"  rows="10" cols="50" name="content" rows="3"></textarea>
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