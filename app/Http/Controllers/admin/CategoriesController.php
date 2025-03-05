<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class CategoriesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('cate_id', 'DESC')->get();
        return view('admin.categories.list', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'image' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'description' => 'nullable|string', // cho phép mổ tả trống nhưng vẫn là string ?? null
            'status' => 'required',
        ],[
            'title.required' => 'Yêu cầu nhập tiêu đề',
            'title.unique' => 'Tiêu đề đã có',
            'image.required' => 'Yêu cầu chọn hình ảnh',
            'status.required' => 'Yêu cầu check trạng thái',
        ]
        );
        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'] ?? null;
        $category->status = $data['status'];
        
        // thêm hình ảnh
        $get_image = $request->image;
        $path = 'upload/categories/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0, 999). '.' .$get_image->getClientOriginalExtension();
        // dd($new_image);
        $get_image->move($path, $new_image);

        $category->image = $new_image;
        toastr()->success('Data has been saved successfully!');

        $category->save(); // lưu vào db
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'description' => 'nullable|string', // cho phép mổ tả trống nhưng vẫn là string ?? null
            'status' => 'required',
        ],[
            'title.required' => 'Yêu cầu nhập tiêu đề',
            'title.unique' => 'Tiêu đề đã có',
            'status.required' => 'Yêu cầu check trạng thái',
        ]
        );
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->description = $data['description'] ?? null;
        $category->status = $data['status'];
        
        // thêm hình ảnh
        if($request->image){
            $get_image = $request->image;
            $path = 'upload/categories/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 999). '.' .$get_image->getClientOriginalExtension();
            // dd($new_image);
            $get_image->move($path, $new_image);

            $category->image = $new_image;
        }
        toastr()->success('Data has been saved successfully!');
        $category->save(); // lưu vào db
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('categories.index');
    }
}
