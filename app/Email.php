<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    
    public function user()
{
    return $this->belongsTo('App\User')->withDefault();
}
     
}
