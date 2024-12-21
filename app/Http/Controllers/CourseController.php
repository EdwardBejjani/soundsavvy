<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('instructor')->only('new', 'create', 'edit', 'update', 'destroy');
    }
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $items = Item::where('type', '=', 'course')->filter()->paginate(10);
            return view('dashboard.admin.courses.index', compact('items'));
        } elseif (Auth::user()->role == 'instructor') {
            $items = Item::where('user_id', Auth::id())->paginate(10);
            return view('dashboard.instructor.courses.index', compact('items'));
        } else {
            $items = Item::where('user_id', Auth::id())->get();
            return view('courses.index', compact('item'));
        }
    }

    public function show(Item $item)
    {
        if (Auth::user()->role == 'admin') {
            $modules = Module::where('item_id', $item->id)->get();
            return view('dashboard.admin.courses.show', compact('item', 'modules'));
        } elseif (Auth::user()->role == 'instructor') {
            $modules = Module::where('item_id', $item->id)->get();
            return view('dashboard.instructor.courses.show', compact('item', 'modules'));
        } else {
            return view('courses.show', compact('item'));
        }
    }

    public function new()
    {
        return view('dashboard.instructor.courses.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'image' => 'required',
            'price' => 'required | min:1',
            'category_id' => 'required | exists:categories,id',
            'SKU' => 'required',
        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');
        }
        $data = $request->all();
        $data['image'] = $path;
        Item::create($data);
        return redirect()->back()->with('success', 'Course Created Successfully')->with('image_path', $path);
    }

    public function edit(Item $item)
    {
        return view('dashboard.instructor.courses.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',,
            'price' => 'required | min:1',
            'category_id' => 'required | exists:categories,id',
            'sku' => 'required',
        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');
        }
        $data = $request->all();
        $item->update($data);
        return redirect()->route('instructor.courses.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('instructor.courses.index');
    }
}
