<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get key metrics
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', '!=', Order::STATUS_CANCELLED)
            ->sum('total_amount');
        $totalitems = Item::count();
        $totalUsers = User::count();

        // Recent orders
        $recentOrders = Order::latest()->take(10)->get();

        // Low stock items
        $lowStockitems = Item::where('stock', '<', 10)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'totalItems',
            'totalUsers',
            'recentOrders',
            'lowStockitems'
        ));
    }

    public function orders(Request $request)
    {
        $query = Order::query();

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Date range filter
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $orders = $query->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function itemManagement()
    {
        $items = Item::with('category')->paginate(10);
        return view('admin.items.index', compact('items'));
    }
}
