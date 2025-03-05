<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TimeLine;
use App\Models\admin\Tour;

class TimeLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                'tour_id' => 'required',
                'title' => 'required|max:255',
                'description' => 'nullable',

            ]
        );
        $timeLine = new TimeLine();
        $timeLine->tour_id = $data['tour_id'];
        $timeLine->title = $data['title'];
        $timeLine->description = $data['description'];
        $timeLine->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timeLine = TimeLine::where('tour_id', $id)->get();
        $tour = Tour::find($id);
        // dd($tour);
        return view('admin.timelines.add', compact('tour', 'id', 'timeLine'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = TimeLine::find($id);
        $gallery->delete();
        return redirect()->back();
    }
}
