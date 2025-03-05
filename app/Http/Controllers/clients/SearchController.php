<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Tour;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->has('start_date') && $request->has('end_date')) {
            if ($request->start_date > $request->end_date) {
                toastr()->error('Ngày khởi hành không được lớn hơn ngày kết thúc.');
                return redirect()->back();
            }
        }

        $query = Tour::query();

        // Lọc theo thành phố
        if(empty($request->city)){
            toastr()->error('Vui Lòng Chọn Điểm Đến');
            return redirect()->back();
        }

        if ($request->has('city') && !empty($request->city)) {
            $query->where('itinerary', 'LIKE', "%{$request->city}%")
            ->orwhere('title', 'LIKE', "%{$request->city}%")
            ->orwhere('destination', 'LIKE', "%{$request->city}%");
        }
        

        // Lọc theo ngày khởi hành
        if ($request->has('start_date') && !empty($request->start_date)) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        // Lọc theo ngày kết thúc
        if ($request->has('end_date') && !empty($request->end_date)) {
            $query->whereDate('end_date', '<=', $request->end_date);
        }

        // Lấy kết quả
        $tours = $query->get();
        // dd($tours);
        return view('client.search', compact('tours'));
    }
}
