<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('instructor')->only('new', 'create', 'edit', 'update', 'destroy');
    }

    public function new(Item $item)
    {
        return view('dashboard.instructor.courses.modules.new', compact('item'));
    }
    public function create(Item $item, Request $request)
    {
        $request->validate([
            'title' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'link' => 'required | url',
        ]);
        $data = $request->all();
        Module::create($data);
        return redirect()->back()->with('message', 'Module Created Successfully');
    }

    public function show(Item $item, Module $module)
    {
        return view('dashboard.instructor.courses.modules.show', compact('item', 'module'));
    }

    public function edit(Item $item, Module $module)
    {
        return view('dashboard.instructor.courses.modules.edit', compact('module', 'item'));
    }

    public function update(Request $request, Item $item, Module $module)
    {
        $request->validate([
            'title' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'link' => 'required | url',
        ]);
        $data = $request->all();
        $module->update($data);
        return redirect()->back()->with('message', 'Module Updated Successfully');
    }

    public function destroy(Item $item, Module $module)
    {
        $module->delete();
        return redirect()->back()->with('message', 'Module Deleted Successfully');
    }
}
