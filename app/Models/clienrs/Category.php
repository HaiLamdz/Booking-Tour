<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getAllCategory()
    {
        $AllCate = DB::table($this->table)->get();
        return $AllCate;
    }

    public function cateById($id)
    {
        $getTourByCate = DB::table($this->table)->where('cate_id', $id)->first();
        return $getTourByCate;
    }
}
