<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function address()
    {
        return $this->hasMany('App\Address', 'contacts_id');
    }
}
