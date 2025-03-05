<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLine extends Model
{
    use HasFactory;
    protected $table = 'time_line'; // Đảm bảo tên bảng đúng
    protected $primaryKey = 'timeLine_id'; // Đặt khóa chính đúng với DB
    public $incrementing = true; // Nếu cate_id là auto-increment
    protected $keyType = 'int'; // Nếu cate_id là kiểu số nguyên
}
