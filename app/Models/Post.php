<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=['title','category_id','user_id','text','publication_at'];
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function comments()
    {
        return $this->hasMany(Comment::class);
    }
    function category()
    {
        return $this->belongsTo(Category::class);
    }
    function like()
    {
        return $this->hasMany(Like::class);
    }
}
