<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function address()
    {
        return $this->hasMany('App\Address', 'contacts_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
