<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CongThuc;
use App\NguoiDung;
class ChiaSe extends Model
{
    //
    public function congthuc(){
        return $this->belongsTo(CongThuc::class);
    }
    public function user(){
        return $this->belongsTo(NguoiDung::class);
    }
}
