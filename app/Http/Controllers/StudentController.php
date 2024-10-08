<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('pages.student.index', compact('students'));
    }

    public function create()
    {
        $classes = Classes::all();
        return view('pages.student.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => ['required', 'exists:classes,id'],
            'nip' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'gender' => ['required'],
        ]);

        Student::create([
            'class_id' => $request->class_id,
            'nip' => $request->nip,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        session()->flash('success', 'Student created successfully');
        return redirect()->route('student.index');
    }

    public function edit(Student $student)
    {
        // Ambil semua data kelas untuk dropdown
        $classes = Classes::all();

        // Kirim data student dan classes ke view
        return view('pages.student.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        // Validasi data
        $request->validate([
            'class_id' => ['required', 'exists:classes,id'],
            'nip' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'gender' => ['required'],
        ]);

        // Update data student
        $student->update([
            'class_id' => $request->class_id,
            'nip' => $request->nip,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        // Flash message sukses dan redirect
        session()->flash('success', 'Student updated successfully');
        return redirect()->route('student.index');
    }
}
