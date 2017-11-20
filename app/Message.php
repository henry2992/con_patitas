<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "location_messages";
    protected $fillable = [
        'user_id','pet_id','lat','lng','contents','is_view',
    ];


//    public function pet(){
//
//        return $this->hasOne('App\Pet');
//    }
}
