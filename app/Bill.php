<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    public $timestamps = false;
<<<<<<< HEAD

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

=======
>>>>>>> origin/Nasim
}
