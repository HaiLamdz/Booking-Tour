<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours'; // Đảm bảo tên bảng đúng
    protected $primaryKey = 'tour_id'; // Đặt khóa chính đúng với DB
    public $incrementing = true; // Nếu cate_id là auto-increment
    protected $keyType = 'int'; // Nếu cate_id là kiểu số nguyên
    
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id', 'cate_id');
    }
}
