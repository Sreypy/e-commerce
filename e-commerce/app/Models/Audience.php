<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $fillable = ['name', 'article_id', 'user_id'];

    // 2. Audience → User (1–1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Audience → Article (Many–1)
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // 5. Audience → Comments (Polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

