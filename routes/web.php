<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Route::resource('tasks', TaskController::class);
Route::resource('tasks', TaskController::class)->only(['index']);
Route::resource('tasks', TaskController::class)->only(['show','create','store','edit','update','destroy']) ->middleware('auth');

// Route::get('/', function () { return route('welcome');});
Route::get('/', function () { return redirect('tasks');});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
