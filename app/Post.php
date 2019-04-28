<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug','title','content','author_id'
    ];

    public function author() {
        return $this->belongsTo(User::class,'author_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
