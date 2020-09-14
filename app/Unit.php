<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    public $timestamps = false;

        public function floor()
        {
            return $this->belongsTo(Floor::class,'floorId','id');
        }

        public function tanent()
        {
            return $this->hasOne(Tanent::class, 'rantedUnit','id');
        }
}