<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

}
