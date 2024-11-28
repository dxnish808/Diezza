<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'in_stock', 'category_id'];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
