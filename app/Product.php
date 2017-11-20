<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $table="products";

    protected $fillable = [

    	'name','price','type','images','status','unique_key','descriptions'
    ];
}
