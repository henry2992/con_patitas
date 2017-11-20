<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = "tags";

    protected $fillable = [
        'pet_id','tag'
    ];

    public function pet(){
      return $this->hasOne('App\Pet');
    }
}
