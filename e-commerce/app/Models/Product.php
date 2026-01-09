<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'created_by',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
