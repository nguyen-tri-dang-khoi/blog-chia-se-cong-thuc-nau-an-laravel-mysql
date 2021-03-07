<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiCongThuc;
use App\Admin;
class CongThuc extends Model
{
    //
    protected $table = "congthucs";
    protected $fillable = [
        'ten_cong_thuc','admin_id','loai_cong_thuc_id','mo_ta_cong_thuc','hinh_anh','ngay_dang'
    ];
    public function loaicongthuc(){
        return $this->belongsTo(LoaiCongThuc::class);
    }
    public function user(){
        return $this->belongsTo(Admin::class);
    }
    /*public function danhgia(){
        return $this->hasMany(DanhGia::class);
    }
    public function chiase(){
        return $this->hasMany(ChiaSe::class);
    }
    public function luutru(){
        return $this->hasMany(LuuTru::class);
    }*/
    public function binhluan(){
        return $this->hasMany(BinhLuan::class);
    }
}
