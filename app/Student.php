<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function grades()
    {
        return $this->belongsToMany('App\Assignment')->withPivot('grade');
    }
}
