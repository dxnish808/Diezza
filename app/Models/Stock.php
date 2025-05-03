<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'quantity', 
        'category_id',
        'picture', 
        'barcode', 
        'brand', 
        'capacity', 
        'sell_price', 
        'cost', 
        'status', 
        'arrival_date',
        'order_group_id'
    ];

    // For Laravel 8+ use $casts instead of $dates
    protected $casts = [
        'arrival_date' => 'datetime:Y-m-d', 
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    
    public function getFormattedArrivalDateAttribute()
    {
        return $this->arrival_date->format('Y-m-d');
    }

    
}