<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
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
            $users = User::select('id', 'name')->where('role', 'vendor')->get();
            return view('dashboard.admin.products.index', compact('items', 'users'));
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
        $categories = Category::all();
        return view('dashboard.vendor.products.new', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required | min:1',
            'category_id' => 'required | exists:categories,id',
            'sku' => 'required',
        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');
        }
        $data = $request->all();
        $data['image'] = $path;
        Item::create($data);
        return redirect()->back()->with('success', 'Product Created Successfully')->with('image_path', $path);
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('dashboard.vendor.products.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'image' => 'nullable | image | mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required | min:1',
            'category_id' => 'required | exists:categories,id',
            'sku' => 'required',
        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');
        }
        $data = $request->all();
        $item->update($data);
        return redirect()->route('vendor.products.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('vendor.products.index');
    }
}
