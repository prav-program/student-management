<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes (login, register, etc.)
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Student CRUD routes
    Route::resource('students', StudentController::class);

    // Restore soft-deleted student
    Route::post('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
});

