<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floors';
    public $timestamps = false;

    public function unit()
        {
            return $this->belongsTo('App\floor');
        }
}