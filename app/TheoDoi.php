<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class TheoDoi extends Model
{
    //
    public function user_duoc_theo_doi(){
        return $this->belongsTo(User::class);
    }
    public function user_theo_doi(){
        return $this->belongsTo(User::class);
    }
}
