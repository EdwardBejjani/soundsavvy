<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'parent_id',
        'is_active'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // Automatically generate slug when creating/updating
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Scope for active categories
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get nested categories for admin management
    public static function getNestedCategories()
    {
        return self::whereNull('parent_id')
            ->with('children')
            ->get();
    }
}
