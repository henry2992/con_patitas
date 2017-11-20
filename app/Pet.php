<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //
    protected $table = "pets";


    protected $fillable = [
        'user_id','name','avatar','tag_id','breed','gender','type','birth','weight','unit','spay','rabiestag','license',
        'microchip','municipal_license','municipal_license_location','municipal_expiration','additional_color',
        'additional_medical','missing'
    ];

    public function tag(){
        return $this->belongsTo('App\Tag');
    }

    public function provider(){
        return $this->belongsTo('App\Provider');
    }

    public function message(){
        return $this->hasMany('App\Message');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
