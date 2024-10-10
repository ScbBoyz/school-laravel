<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('pages.teacher.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('pages.teacher.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'nidn' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
        ]);

        Teacher::create([
            'subject_id' => $request->subject_id,
            'nidn' => $request->nidn,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);

        session()->flash('success', 'Teacher created successfully');
        return redirect()->route('teacher.index');
    }

    public function edit(Teacher $teacher)
    {
        $subjects = Subject::all();

        return view('pages.teacher.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'nidn' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
        ]);

        $teacher->update([
            'subject_id' => $request->subject_id,
            'nidn' => $request->nidn,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);

        session()->flash('success', 'Teacher updated successfully');
        return redirect()->route('teacher.index');
    }
}
