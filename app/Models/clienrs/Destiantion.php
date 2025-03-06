<?php

namespace App\Models\clienrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Destiantion extends Model
{
    use HasFactory;

    protected $table = 'tours';

    public function getHomeDestination(){
        $getTour = DB::table($this->table)->limit(4)->get();
        return $getTour;
    }
}
