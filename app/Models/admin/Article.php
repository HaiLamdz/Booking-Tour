<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'news'; // Đảm bảo tên bảng đúng
    protected $primaryKey = 'new_id'; // Đặt khóa chính đúng với DB
    public $incrementing = true; // Nếu cate_id là auto-increment
    protected $keyType = 'int'; // Nếu cate_id là kiểu số nguyên



}
