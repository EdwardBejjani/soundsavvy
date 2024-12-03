<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function add($itemId, $quantity = 1)
    {
        $cart = Session::get('cart', []);
        $item = Item::findOrFail($itemId);

        if (!$item->isInStock()) {
            throw new \Exception("item is out of stock");
        }

        if (isset($cart[$itemId])) {
            $cart[$itemId] += $quantity;
        } else {
            $cart[$itemId] = $quantity;
        }

        Session::put('cart', $cart);
    }

    public function remove($itemId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$itemId]);
        Session::put('cart', $cart);
    }

    public function getCart()
    {
        $cart = Session::get('cart', []);
        $cartDetails = [];

        foreach ($cart as $itemId => $quantity) {
            $item = Item::find($itemId);
            $cartDetails[] = [
                'item' => $item,
                'quantity' => $quantity,
                'total' => $item->price * $quantity
            ];
        }

        return $cartDetails;
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->getCart() as $item) {
            $total += $item['total'];
        }
        return $total;
    }

    public function clear()
    {
        Session::forget('cart');
    }
}
