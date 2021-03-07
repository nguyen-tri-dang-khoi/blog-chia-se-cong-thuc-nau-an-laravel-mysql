<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CongThuc;
class LoaiCongThuc extends Model
{
    //
    protected $table = 'loaicongthucs';
    protected $fillable = [
        'ten_loai_cong_thuc','da_xoa'
    ];
    public function congthucs(){
        return $this->hasMany(CongThuc::class,'loai_cong_thuc_id','id');
    }
}
