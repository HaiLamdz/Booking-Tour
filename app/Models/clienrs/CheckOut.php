<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CheckOut extends Model
{
    use HasFactory;
    protected $table = 'check_outs';

    public function createCheckOut($data){
        // chèn dữ liệu và trả về id 
        return DB::table($this->table)->insertGetId($data);
    }
}
