<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class home extends Model
{
    use HasFactory;

    protected $table = 'tours';

    public function getHomeTour(){
        $getTour = DB::table($this->table)->get();
        return $getTour;
    }
}
