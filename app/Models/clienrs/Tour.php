<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';

    public function getAllTourByCate()
    {
        return DB::table($this->table)
            ->join('categories', 'tours.cate_id', '=', 'categories.cate_id') // JOIN với bảng categories
            ->select('tours.cate_id', 'categories.title', DB::raw('COUNT(tours.tour_id) as total_tours'))
            ->groupBy('tours.cate_id', 'categories.title')
            ->get();
    }

    public function getAllTour()
    {
        return DB::table($this->table)->get();
    }


    public function tourByCate($cate_id)
    {
        $getTourByCate = DB::table($this->table)->where('cate_id', $cate_id)->get();
        return $getTourByCate;
    }


    public function getTourDetail($id)
    {
        $getTourDetail = DB::table($this->table)
            ->leftJoin('reviews', 'tours.tour_id', '=', 'reviews.tour_id')
            ->leftJoin('users', 'reviews.user_id', '=', 'users.user_id')
            ->where('tours.tour_id', $id)
            ->select(
                'tours.*',
                'reviews.rating',
                'reviews.review_message',
                'users.*'
            )
            ->first(); // Chỉ lấy một bản ghi

        // Kiểm tra nếu không tìm thấy tour
        if (!$getTourDetail) {
            return response()->json(['message' => 'Tour không tồn tại'], 404);
        }

        // Lấy danh sách ảnh
        $getTourDetail->images = DB::table('images')
            ->where('tour_id', $getTourDetail->tour_id)
            ->limit(6)
            ->pluck('image_url');

        // Lấy danh sách timeline
        $getTourDetail->time_line = DB::table('time_line')
            ->where('tour_id', $getTourDetail->tour_id)
            ->get();

        return $getTourDetail;
    }


    public function updateTour($id, $data)
    {
        $update = DB::table($this->table)
            ->where('tour_id', $id)
            ->update($data);
        return $update;
    }




    // kiemre tra ng dùng có đủ điền kiện đánh gia hay khôgn
    // Kiểm tra xem Người dùng đã hoàn thành tour chưa
    public function hasCompletedTour($user_id, $tour_id)
    {
        return DB::table('bookings')
            ->where('user_id', $user_id)
            ->where('tour_id', $tour_id)
            ->where('booking_status', 'f')
            ->exists();
    }
    // Kiểm tra người dùng đã đánh giá chưa
    public function hasReviewed($user_id, $tour_id)
    {
        return DB::table('reviews')
            ->where('user_id', $user_id)
            ->where('tour_id', $tour_id)
            ->exists();
    }

    // lưu đánh giá vào đb nếu đủ điều kiện
    public function insertReview($user_id, $id, $data)
    {
        // Kiểm tra điều kiện
        $hasCompletedTour = $this->hasCompletedTour($user_id, $id);
        $hasReviewed = $this->hasReviewed($user_id, $id);
        // dd($hasCompletedTour, $hasReviewed);

        if (!$hasCompletedTour) {
            toastr()->error('Bạn chưa thể đánh giá tour này.');
            return redirect()->back();
        }

        // Kiểm tra nếu đã đánh giá rồi
        if ($hasReviewed) {
            toastr()->error('Bạn chỉ được đánh giá một lần.');
            return redirect()->back();
        }

        // Nếu thỏa điều kiện, tiến hành lưu đánh giá
        return DB::table('reviews')->insert($data);
    }

    public function getReview($id)
    {
        $getTourStats = DB::table('reviews')
            ->where('tour_id', $id) // Lọc theo tour_id cụ thể
            ->selectRaw('COUNT(*) as total_reviews, AVG(rating) as average_rating')
            ->first();
        return $getTourStats;
    }
}
