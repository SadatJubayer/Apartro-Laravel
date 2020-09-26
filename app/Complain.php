<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table = 'complains';
    public $timestamps = false; 

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitId','id');
    }
}