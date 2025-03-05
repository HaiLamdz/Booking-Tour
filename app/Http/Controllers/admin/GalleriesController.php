<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Gallery;
use App\Models\admin\Tour;

class GalleriesController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                'tour_id' => 'required',
                'description' => 'nullable|max:255',
                'image' => 'required|max:2048',
            ]
        );
        foreach ($request->image as $file) {
            $gallery = new Gallery();
            $gallery->tour_id = $data['tour_id'];
            $gallery->description = $data['description'];
            // thêm hình ảnh
            $get_image = $file;
            $path = 'upload/galleries/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            // dd($new_image);
            $get_image->move($path, $new_image);

            $gallery->image_URL = $new_image;

            $gallery->save(); // lưu vào db
        }
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $galleries = Gallery::where('tour_id', $id)->get();
        $tour = Tour::find($id);
        // dd($tour);
        return view('admin.galleries.add', compact('tour', 'id', 'galleries'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->back();
    }
}
