<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{


    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function contact()
    {
        return $this->belongsTo('App\Contact', 'id');
    }

    
}
