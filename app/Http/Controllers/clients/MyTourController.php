<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Account;
use App\Models\clienrs\Booking;
use App\Models\clienrs\Tour;
use Illuminate\Http\Request;

class MyTourController extends Controller
{
    private $user;
    private $tour;
    private $booking;

    public function __construct()
    {
        $this->user = new Account();
        $this->tour = new Tour();
        $this->booking = new Booking();
    }

    public function index(){
        if (!session()->has('email') ) {
            toastr()->error('Vui lòng đăng nhập trước khi đặt tour.');
            return redirect()->route('loginn');
        }
        $email = session()->get('email');
        $user_id = $user_id = $this->user->getUserId($email);
        $tours = $this->user->getMyTour($user_id);
        // dd($myTour);

        return view('client.myTour', compact('tours'));
    }

    public function insert_review(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'danh_gia_sao' => 'required',
            'comment' => 'nullable'
        ],[
            'danh_gia_sao.required' => 'Vui lòng chọn sao để đánh giá'
        ]);
        $email = session()->get('email');
        $user_id  = $this->user->getUserId($email);
        $data = [
            'tour_id' => $id,
            'user_id' => $user_id,
            'rating' => $request->danh_gia_sao,
            'review_message' => $request->comment ?? null,
        ];
        $review =  $this->tour->insertReview($user_id, $id, $data);
        if(!empty($review)){
            return redirect()->back();
        }
        toastr()->success('Đánh Giá Thành Công');
        return redirect()->back();
    }

    public function tour_booked($id, Request $request){
        $data = $this->user->getTourCancel($id);
        // dd($data);
        return view('client.tour_booked', compact('data'));
    }
    
    public function cancel_booking($id, Request $request){
        $request->validate([
            'booking_status' => 'nullable'
        ]);
        $booking = $this->booking->cancelBooking($id, $request->booking_status);
        toastr()->success('Hủy Tour Thành Công');
        return redirect()->back();
    }

}
