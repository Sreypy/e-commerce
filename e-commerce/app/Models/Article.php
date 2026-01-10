<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'author_id'];

    // Article → Author (Many–1)
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

     // 4. Article → Audiences (1–Many)
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    // 6. Article → Comments (Polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

