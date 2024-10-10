<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Classes
    Route::resource('classes', ClassesController::class);
    Route::get('/classes', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('/classes/{classes}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{class}', [ClassesController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{classes}', [ClassesController::class, 'destroy'])->name('classes.destroy');

    // Student
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

    // Teacher
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    // Subject
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');
});

require __DIR__.'/auth.php';
