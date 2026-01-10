<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'user_id'];

    // Polymorphic relation
    public function commentable()
    {
        return $this->morphTo();
    }

    // Comment → User (Many–1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

