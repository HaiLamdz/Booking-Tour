<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Auth extends Model
{
    use HasFactory;
    protected $table = 'users'; // Đảm bảo tên bảng đúng
    protected $primaryKey = 'user_id'; // Đặt khóa chính đúng với DB
    public $incrementing = true; // Nếu cate_id là auto-increment
    protected $keyType = 'int'; // Nếu cate_id là kiểu số nguyên
    protected $fillable = [
        'user_name', 'email', 'password', 'status', 'token'
    ];
}
