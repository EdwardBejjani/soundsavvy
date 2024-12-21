<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\Module;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home()
    {
        return view('page/home');
    }
    public function about()
    {
        return view('page/about');
    }
    public function contact()
    {
        return view('page/contact');
    }
    public function shop()
    {
        $items = Item::where('type', 'product')->paginate(12);
        return view('page/shop/show', compact('items'));
    }
    public function learn()
    {
        $items = Item::where('type', 'course')->paginate(12);
        return view('page/learn/show', compact('items'));
    }
    public function product(Item $item)
    {

        return view('page/shop/item', compact('item'));
    }
    public function course(Item $item)
    {
        $modules = Module::where('course_id', $item->id);
        return view('page/learn/course', compact('item', 'modules'));
    }

    public function checkout()
    {
        return view('page/shop/checkout');
    }

    public function order(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);
        $cart = $request->input('cart', []);

        if (!$cart || empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        $subTotal = 0;
        $productsCount = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
            $productsCount += $item['quantity'];
        }
        $shippingFee = 10;
        $total = $subTotal + $shippingFee;
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => bcrypt('password'),
                'role' => User::ROLE_CUSTOMER,
            ]
        );

        $order = Order::create([
            'user_id' => $user->id,
            'payment_method' => $request->payment_method,
            'sub_total' => $subTotal,
            'total_price' => $total,
            'status' => Order::STATUS_PENDING,
        ]);
        // Create order items
        foreach ($cart as $item) {
            $product = Item::findOrFail($item['id']);
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $product->id,
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        // $this->sendOrderEmails($order, $user);

        setcookie('cart', '', time() - 3600, '/');

        return redirect()->back()->with('success', 'Order placed successfully.');
    }
    private function sendOrderEmails(Order $order, User $user)
    {
        Mail::send('emails.order-confirmation', ['order' => $order, 'user' => $user], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Order Confirmation');
        });

        Mail::send('emails.order-notification', ['order' => $order], function ($message) {
            $message->to('edwardbejjani@gmail.com')
                ->subject('New Order Notification');
        });
    }
}
