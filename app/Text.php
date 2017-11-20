<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    //

    protected $table = "texts";

    protected $fillable = [
        'slider_one','slider_two','slider_three','slider_four','slider_five'
    ];
}
