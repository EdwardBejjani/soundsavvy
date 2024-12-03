<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
        'item_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Check if item is already in user's wishlist
    public static function isInWishlist($userId, $itemId)
    {
        return self::where('user_id', $userId)
            ->where('item_id', $itemId)
            ->exists();
    }
}
