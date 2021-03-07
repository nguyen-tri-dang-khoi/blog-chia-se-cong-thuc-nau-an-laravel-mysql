<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\CongThuc;
class LuuTru extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function congthuc(){
        return $this->belongsTo(CongThuc::class);
    }
}
