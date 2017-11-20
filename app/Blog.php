<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

    protected $table="blogs";

    protected $fillable = [
        'user_id','text','avatar'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
