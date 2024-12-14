<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('vendor')->only('new', 'create', 'destroy');
    }

    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $items = Item::where('type', '=', 'product')->filter()->paginate(10);
            return view('dashboard.admin.products.index', compact('items'));
        } elseif (Auth::user()->role == 'vendor') {
            $items = Item::where('user_id', Auth::id())->filter()->paginate(10);
            return view('dashboard.vendor.products.index', compact('items'));
        } else {
            $items = Item::where('user_id', Auth::id())->get();
            return view('products.index', compact('items'));
        }
    }

    public function show(Item $item)
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.admin.products.show', compact('item'));
        } elseif (Auth::user()->role == 'vendor') {
            return view('dashboard.vendor.products.show', compact('item'));
        } else {
            return view('products.show', compact('item'));
        }
    }

    public function new()
    {
        return view('dashboard.vendor.products.new');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Item::create($data);
        return redirect()->route('vendor.products.index');
    }

    public function edit(Item $item)
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.admin.products.edit', compact('item'));
        } elseif (Auth::user()->role == 'vendor') {
            return view('dashboard.vendor.products.edit', compact('item'));
        }
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->all();
        $item->update($data);
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.products.index');
        } elseif (Auth::user()->role == 'vendor') {
            return redirect()->route('vendor.products.index');
        }
    }

    public function destroy(Item $item)
    {
        $item->delete();
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.products.index');
        } elseif (Auth::user()->role == 'vendor') {
            return redirect()->route('vendor.products.index');
        }
    }
}
