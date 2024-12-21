<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeFilter($query)
    {
        if (request('name')) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }
        if (request('category')) {
            $query->where('category_id', 'like', '%' . request('category') . '%');
        }
        if (request('type')) {
            $query->where('type', 'like', '%' . request('type') . '%');
        }
        if (request('sku')) {
            $query->where('sku', 'like', '%' . request('sku') . '%');
        }

        return $query;
    }
}
