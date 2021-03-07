<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\CongThuc;
class DanhGia extends Model
{
    //
    public function congthuc(){
        return $this->belongsTo(CongThuc::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
