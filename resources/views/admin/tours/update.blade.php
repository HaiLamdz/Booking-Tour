@extends('admin.layouts.app')
@section('content')

<div class="col-md-12 mt-5 ">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Update Tuor</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="{{route('tours.update', $data->tour_id)}}" method="POST" enctype="multipart/form-data">
            <!--begin::Body-->
            @method('put')
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputEmail1" />
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="noi_dung"  rows="10" cols="50" name="description" rows="3">{{$data->description}}</textarea>
                </div>
                <div class=" mb-3">
                    {{-- {{dd($categories)}} --}}
                    <label for="image" class="form-label">Danh Mục</label>
                    <select class="form-select" name="category" id="">
                        <option value="">Select</option>
                        @foreach($categories as $category)
                            <option {{$category->cate_id==$data->cate_id ? 'selected' : ''}} value="{{$category->cate_id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="inputGroupFile02" />
                    <td><img width="200px" height="auto" src="{{asset('upload/tours/' . $data->image)}}"
                        alt=""></td>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Price Adult</label>
                    <input type="text" name="price_adult" class="form-control" value="{{$data->price_adult}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Price Child</label>
                    <input type="text" name="price_child" class="form-control" value="{{$data->price_child}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" value="{{$data->start_date}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Return_date</label>
                    <input type="date" name="return_date" class="form-control" id="return_date" value="{{$data->end_date}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Duration</label>
                    <input type="text" name="duration" class="form-control" value="{{$data->duration}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Destination</label>
                    <input type="text" name="destination" class="form-control" value="{{$data->destination}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">Itinerary</label>
                    <input type="text" name="itinerary" class="form-control" value="{{$data->itinerary}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-lable">quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{$data->quantity}}">
                </div>
                <div class="mb-3 ">
                    <label class="form-check-label" for="exampleCheck1">Status</label>
                    <input type="checkbox" value="1" name="status" class="form-check-input" id="exampleCheck1" /> <br>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Include</label>
                    <textarea class="form-control" id="service"  rows="10" cols="50" name="include" rows="3">{{$data->include}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Un Include</label>
                    <textarea class="form-control" id="un_service"  rows="10" cols="50" name="un_include" rows="3">{{$data->un_include}}</textarea>
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