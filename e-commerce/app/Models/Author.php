<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'user_id'];

    // 1. Author → User (1–1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 3. Author → Articles (1–Many)
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Polymorphic
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Has Many Through (Author → Articles → Audiences)
    public function audiences()
    {
        return $this->hasManyThrough(
            Audience::class,
            Article::class,
            'author_id',   // FK on articles
            'article_id',  // FK on audiences
            'id',
            'id'
        );
    }
}

