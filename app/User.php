<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\CongThuc;
use App\LuuTru;
use App\ChiaSe;
use App\TheoDoi;
use App\DanhGia;
use App\BinhLuan;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','birth','photo','is_lock','is_delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function congthucs(){
        return $this->hasMany(CongThuc::class,'user_id','id');
    }
    /*
    public function luutru(){
        return $this->hasMany(LuuTru::class);
    }
    public function theodoi(){
        return $this->hasMany(TheoDoi::class);
    }
    public function chiase(){
        return $this->hasMany(ChiaSe::class);
    }
    public function danhgia(){
        return $this->hasMany(DanhGia::class);
    }
    public function binhluan(){
        return $this->hasMany(BinhLuan::class);
    }*/
}
