<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //

    public function grades()
    {
        return $this->belongsToMany('App\Student')->withPivot('grade');
    }
}
