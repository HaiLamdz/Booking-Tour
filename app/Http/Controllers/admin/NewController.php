<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Article;
use Illuminate\Http\Request;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Article::orderBy('new_id', 'DESC')->get();
        return view('admin.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                'title' => 'required|unique:news|max:255',
                'content' => 'nullable|string',
                'image' => 'required'
            ],
            [
                'title.required' => 'Yêu cầu nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã có',
                'image.required' => 'Yêu cầu nhập ảnh'
            ]
        );
        $news = new Article();
        $news->title = $data['title'];
        $news->content = $data['content'];

        // thêm hình ảnh
        $get_image = $request->image;
        $path = 'upload/news/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0, 999). '.' .$get_image->getClientOriginalExtension();
        // dd($new_image);
        $get_image->move($path, $new_image);

        $news->image = $new_image;

        toastr()->success('Data has been saved successfully!');

        $news->save(); // lưu vào db
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $new = Article::find($id);
        return view('admin.news.update', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                'title' => 'required|unique:news|max:255',
                'content' => 'nullable|string',
                'image' => 'required'
            ],
            [
                'title.required' => 'Yêu cầu nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã có',
                'image.required' => 'Yêu cầu nhập ảnh'
            ]
        );
        $news = Article::find($id);
        $news->title = $data['title'];
        $news->content = $data['content'] ?? null;

        if($request->image){
            $get_image = $request->image;
            $path = 'upload/news/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 999). '.' .$get_image->getClientOriginalExtension();
            // dd($new_image);
            $get_image->move($path, $new_image);

            $news->image = $new_image;
        }
        toastr()->success('Data has been saved successfully!');
        $news->save(); // lưu vào db
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new = Article::find($id);
        $new->delete();
        return redirect()->route('news.index');
    }
}
