@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">List Tour</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 10px" scope="col">STT</th>
                            <th scope="col">Mã Tour</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $key => $value)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$value->tour_code}}</td>
                            <td style="max-width: 300px;">{{$value->title}}</td>
                            <td>{{$value->category->title}}</td>
                            <td><img width="200px" height="auto" src="{{asset('upload/tours/' . $value->image)}}"
                                    alt=""></td>
                            <td>
                                {{ number_format($value->price_adult) }}/người lớn
                                <hr>
                                {{ number_format($value->price_child) }}/người trẻ em
                            </td>
                            <td>{{$value->destination}}</td>
                            <td>{{$value->status == 1 ? 'Hoạt Động' : 'Không Hoạt Động'}}</td>
                            <td>
                                <a href="{{route('galleries.show', $value->tour_id)}}"><button class="btn btn-success"><i class="fa-solid fa-file-image"></i></button></a> <br>
                                <a href="{{route('timelines.show', $value->tour_id)}}"><button class="btn btn-info"><i class="fa-solid fa-timeline"></i></button></a> <br>
                                <a href="{{route('tours.update', $value->tour_id)}}"><button
                                        class="btn btn-warning"><i class="fa-solid fa-wrench"></i></button></a>
                                <form action="{{route('tours.destroy', $value->tour_id)}}"
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
    </div>
</div>

@endsection