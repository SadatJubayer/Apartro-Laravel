<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}