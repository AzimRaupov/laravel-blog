<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commment extends Model
{
    function post()
    {
return $this->belongsTo(Post::class);
    }
}
