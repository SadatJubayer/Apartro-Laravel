<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanent extends Model
{
    protected $table = 'tanents';
    public $timestamps = false;



    public function unit()
    {
        return $this->belongsTo(Unit::class, 'rantedUnit', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

   
}
