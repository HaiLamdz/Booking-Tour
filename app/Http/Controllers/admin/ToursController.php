<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Tour;
use App\Models\admin\Category;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category')->orderBy('tour_id', 'DESC')->get();
        // dd($tours);
        return view('admin.tours.list', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('cate_id', 'DESC')->get();
        return view('admin.tours.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|unique:tours|max:255', // Đổi 'categories' thành 'tours' nếu bảng lưu là 'tours'
            'image' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
            'include' => 'nullable|string',
            'un_include' => 'nullable|string',
            'availability' => 'nullable|string',
            'price_adult' => 'required|numeric|min:1', // Giá phải lớn hơn 0
            'price_child' => 'required|numeric|min:1', // Giá phải lớn hơn 0
            'category' => 'required',
            'start_date' => 'required|date', // Đổi tên đúng
            'return_date' => 'required|date',
            'duration' => 'required|string',
            'destination' => 'required|string',
            'itinerary' => 'required|string',
            'quantity' => 'required|integer|min:1', // Kiểm tra số lượng phải là số nguyên dương
            'status' => 'required', // Nếu là checkbox true/false
        ]);
        // var_dump($data);die;
        $tour = new Tour();
        $tour->title = $data['title'];
        $tour->description = $data['description'] ?? null;
        $tour->tour_code = 'HL-' . rand(0000, 9999);
        $tour->price_adult = $data['price_adult'];
        $tour->price_child = $data['price_child'];
        $tour->cate_id = $data['category'];
        $tour->duration = $data['duration'];
        $tour->start_date = $data['start_date'];
        $tour->end_date = $data['return_date'];
        $tour->duration = $data['duration'];
        $tour->destination = $data['destination'];
        $tour->itinerary = $data['itinerary'];
        $tour->availability = $data['availability'];
        $tour->quantity = $data['quantity'];
        $tour->status = $data['status'];
        $tour->include = $data['include'];
        $tour->un_include = $data['un_include'];
        // dd($tour);
        // thêm hình ảnh
        $get_image = $request->image;
        $path = 'upload/tours/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
        // dd($get_image);
        $get_image->move($path, $new_image);

        $tour->image = $new_image;
        // dd($tour);
        toastr()->success('Data has been saved successfully!');
        $tour->save(); // lưu vào db
        return redirect()->route('tours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::orderBy('cate_id', 'DESC')->get();
        // dd($categories);
        $data = Tour::find($id);
        return view('admin.tours.update', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|unique:tours|max:255', // Đổi 'categories' thành 'tours' nếu bảng lưu là 'tours'
            'image' => 'file|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
            'include' => 'nullable|string',
            'un_include' => 'nullable|string',
            'availability' => 'nullable|string',
            'price_adult' => 'required|numeric|min:1', // Giá phải lớn hơn 0
            'price_child' => 'required|numeric|min:1', // Giá phải lớn hơn 0
            'category' => 'required',
            'start_date' => 'required|date', // Đổi tên đúng
            'return_date' => 'required|date',
            'duration' => 'required|string',
            'destination' => 'required|string',
            'itinerary' => 'required|string',
            'quantity' => 'required|integer|min:1', // Kiểm tra số lượng phải là số nguyên dương
            'status' => 'required', // Nếu là checkbox true/false
        ]);
        // var_dump($data);die;
        $tour = Tour::find($id);
        $tour->title = $data['title'];
        $tour->description = $data['description'] ?? null;
        $tour->tour_code = 'HL-' . rand(0000, 9999);
        $tour->price_adult = $data['price_adult'];
        $tour->price_child = $data['price_child'];
        $tour->cate_id = $data['category'];
        $tour->duration = $data['duration'];
        $tour->start_date = $data['start_date'];
        $tour->end_date = $data['return_date'];
        $tour->duration = $data['duration'];
        $tour->destination = $data['destination'];
        $tour->itinerary = $data['itinerary'];
        $tour->quantity = $data['quantity'];
        $tour->status = $data['status'];
        $tour->include = $data['include'];
        $tour->un_include = $data['un_include'];
        // dd($tour);
        // thêm hình ảnh

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if (!empty($tour->image)) {
                $old_image_path = public_path('upload/tours/' . $tour->image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
    
            // Upload ảnh mới
            $get_image = $request->file('image');
            $path = 'upload/tours/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path($path), $new_image);
    
            // Cập nhật ảnh mới vào database
            $tour->image = $new_image;
        } else{
            $tour->image = $tour->image;
        }
        // dd($tour);
        toastr()->success('Data has been saved successfully!');
        $tour->save(); // lưu vào db
        return redirect()->route('tours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = Tour::find($id);
        $tour->delete();
        return redirect()->route('tours.index');
    }
}
