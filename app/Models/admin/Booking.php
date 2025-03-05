<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings'; // Đảm bảo tên bảng đúng
    protected $primaryKey = 'booking_id'; // Đặt khóa chính đúng với DB
    public $incrementing = true; // Nếu cate_id là auto-increment
    protected $keyType = 'int'; // Nếu cate_id là kiểu số nguyên

    public function getBooking()
    {
        $myTour = DB::table($this->table)
            ->join('tours', 'bookings.tour_id', 'tours.tour_id')
            ->orderByDesc('bookings.booking_date')
            ->get();


        return $myTour;
    }

    public function getBookingTour($id){
        $myTour = DB::table("bookings")
        ->join('tours', 'bookings.tour_id', 'tours.tour_id')
        ->join('check_outs', 'bookings.booking_id', 'check_outs.booking_id')
        ->join('users', 'bookings.user_id', 'users.user_id')
        ->where('bookings.booking_id', $id)
        ->first();

        return $myTour;
    }
}
