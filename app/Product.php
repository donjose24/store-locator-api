<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function stores()
    {
        return $this->belongsToMany('App\Store');
    }
}
