<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    public function createBooking($data){
        // chèn dữ liệu và trả về id 
        return DB::table($this->table)->insertGetId($data);
    }

    public function cancelBooking($id, $booking_status){
        $myTour = DB::table("bookings")
        ->where('booking_id', $id)
        ->update(['booking_status' => $booking_status]);
        // dd($myTour);
        return $myTour;
    }
}
