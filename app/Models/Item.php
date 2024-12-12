<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'stock',
        'category_id',
        'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function isInStock()
    {
        return $this->stock > 0;
    }

    public function reduceStock($quantity)
    {
        $this->decrement('stock', $quantity);
    }
}
