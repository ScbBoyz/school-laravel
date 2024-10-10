<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('pages.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('pages.subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        Subject::create([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Subject created successfully');

        return redirect()->route('subject.index');
    }

    public function edit(Subject $subject)
    {
        return view('pages.subject.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $subject->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Subject updated successfully');

        return redirect()->route('subject.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        session()->flash('success', 'Subject deleted successfully');
        return redirect()->route('subject.index');
    }
}
