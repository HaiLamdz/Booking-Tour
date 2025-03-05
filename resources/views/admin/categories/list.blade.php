@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">List Category</h3>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-bordered" id="myTable" style="text-align: center">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">STT</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $value)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$value->title}}</td>
                                <td><img width="150px" height="auto" src="{{asset('upload/categories/' . $value->image)}}"
                                        alt=""></td>
                                {{-- <td>{{$value->image}}</td> --}}
                                <td>{{$value->description}}</td>
                                <td>{{$value->status == 1 ? 'Hoạt Động' : 'Không Hoạt Động'}}</td>
                                <td>
                                    <a href="{{route('categories.update', $value->cate_id)}}"><button
                                            class="btn btn-warning"><i class="fa-solid fa-wrench"></i></button></a>
                                    <form action="{{route('categories.destroy', $value->cate_id)}}"
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
</div>

@endsection