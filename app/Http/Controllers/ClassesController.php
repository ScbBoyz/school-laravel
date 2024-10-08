<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('pages.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('pages.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_number' => ['required'],
        ]);

        Classes::create([
            'class_number' => $request->class_number,
        ]);

        session()->flash('success', 'Class created successfully');
        return redirect()->route('classes.index');
    }

    public function edit(Classes $class)
    {
        return view('pages.classes.edit', compact('class'));
    }

    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'class_number' => ['required'],
        ]);

        $class->update([
            'class_number' => $request->class_number,
        ]);

        session()->flash('success', 'Class updated successfully');
        return redirect()->route('classes.index');
    }

    public function destroy(Classes $class)
    {
        $class->delete();
        session()->flash('success', 'Class deleted successfully');
        return redirect()->route('classes.index');
    }
}
