<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'user_id'; // Đặt khóa chính đúng với DB
    public $incrementing = true; // Nếu cate_id là auto-increment
    protected $keyType = 'int'; // Nếu cate_id là kiểu số nguyên

    protected $table = 'users';

    protected $fillable = [
        'user_name',
        'email',
        'password',
        'google_id'
    ];

    public function getUserId($email){
        return DB::table('users')
        ->select('user_id')
        ->where('email', $email)->value('user_id');
    }

    public function getUser($email){
        return DB::table('users')
        ->where('email',$email)->first();
    }

    public function updateUser($email){

    }

    public function getMyTour($id){
        $myTour = DB::table("bookings")
        ->join('tours', 'bookings.tour_id', 'tours.tour_id')
        ->join('check_outs', 'bookings.booking_id', 'check_outs.booking_id')
        ->where('bookings.user_id', $id)
        ->orderByDesc('bookings.booking_date')
        ->get();

        foreach($myTour as $tour){
            $tour->rating = DB::table('reviews')
            ->where('tour_id', $tour->tour_id)
            ->where('user_id', $id)
            ->value('rating'); // dùng valu để lấy giá trị rating
        }


        return $myTour;
    }

    public function getTourCancel($id){
        $myTour = DB::table("bookings")
        ->join('tours', 'bookings.tour_id', 'tours.tour_id')
        ->join('check_outs', 'bookings.booking_id', 'check_outs.booking_id')
        ->where('bookings.booking_id', $id)
        ->first();

        return $myTour;
    }
}
