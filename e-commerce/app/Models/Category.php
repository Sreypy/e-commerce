<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'assigned_to',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
