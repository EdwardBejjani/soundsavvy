<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    protected $cartService;


    public function __construct(CartService $cartService,)
    {
        $this->middleware('auth');
        $this->cartService = $cartService;
    }

    public function checkout()
    {
        $cartItems = $this->cartService->getCart();
        $total = $this->cartService->calculateTotal();

        return view('orders.checkout', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $validatedData = $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            // Get cart items
            $cartItems = $this->cartService->getCart();

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $this->cartService->calculateTotal(),
                'status' => Order::STATUS_PENDING,
                'shipping_address' => $validatedData['shipping_address'],
                'billing_address' => $validatedData['billing_address']
            ]);

            // Add items to order
            $order->addItems($cartItems);



            // Update order status
            DB::commit();

            return redirect()->route('orders.confirmation', $order)
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Order processing failed: ' . $e->getMessage());
        }
    }

    public function confirmation(Order $order)
    {
        return view('orders.confirmation', compact('order'));
    }

    public function index()
    {
        $orders = Auth::user()->orders()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }
}