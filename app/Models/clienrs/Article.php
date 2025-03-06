<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getHomeNew(){
        $getNew = DB::table($this->table)->limit(3)->get();
        return $getNew;
    }


    public function getAllNew(){
        $getNew = DB::table($this->table)->get();
        return $getNew;
    }

    public function getDetailNew($id){
        $getNew = DB::table($this->table)->where('new_id', $id)->first();
        return $getNew;
    }
}
