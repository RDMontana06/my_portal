<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function companies(){
        return $this->belongsTo('App\Company');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }
}
