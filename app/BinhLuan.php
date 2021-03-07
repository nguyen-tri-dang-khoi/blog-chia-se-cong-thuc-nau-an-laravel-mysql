<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CongThuc;
use App\NguoiDung;
class BinhLuan extends Model
{
    //
    protected $table = 'binhluans';
    protected $fillable = [
        'noi_dung_binh_luan','user_id','cong_thuc_id','thoi_gian_binh_luan'
    ];
    public function congthuc(){
        return $this->belongsTo(CongThuc::class);
    }
    public function user(){
        return $this->belongsTo(NguoiDung::class);
    }
}
