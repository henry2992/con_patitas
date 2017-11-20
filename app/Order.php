<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";


    protected $fillable = [
        'id','user_id','product_id','count','price','is_approved'
    ];
    
     public function product(){
        return $this->hasOne('App\Product','id','product_id');
    }
    
     public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

}
