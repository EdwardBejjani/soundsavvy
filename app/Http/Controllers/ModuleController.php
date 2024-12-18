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
    public function create(Request $request)
    {
        $item = Item::find($request->item_id);
        $request->validate([
            'title' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'link' => 'required | url',
        ]);
        $data = $request->all();
        Module::create($data);
        return redirect()->route('instructor.courses.index');
    }

    public function show(Module $module)
    {
        return view('instructor.courses.modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        return view('instructor.courses.modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required | min:3 | max:50',
            'description' => 'required | min:10 | max:300',
            'link' => 'required | url',
        ]);
        $data = $request->all();
        $module->update($data);
        return redirect()->route('instructor.courses.index');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('instructor.courses.index');
    }
}
