<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Services\CartService;
use App\Services\CouponService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    protected $couponService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCart();
        $total = $this->cartService->calculateTotal();

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'integer|min:1|max:10'
        ]);

        try {
            $this->cartService->add(
                $request->item_id,
                $request->input('quantity', 1)
            );

            return redirect()->route('cart.index')
                ->with('success', 'item added to cart');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function remove($itemId)
    {
        $this->cartService->remove($itemId);

        return redirect()->route('cart.index')
            ->with('success', 'item removed from cart');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        $total = $this->cartService->calculateTotal();
        $couponResult = $this->couponService->applyCoupon(
            $request->coupon_code,
            $total
        );

        if ($couponResult['success']) {
            // Store coupon in session
            session()->put('applied_coupon', $couponResult['coupon']);

            return redirect()->route('cart.index')
                ->with('success', 'Coupon applied successfully')
                ->with('discount', $couponResult['discount'])
                ->with('final_total', $couponResult['final_total']);
        }

        return back()->with('error', $couponResult['message']);
    }
}
