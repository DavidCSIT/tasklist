<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('movies', MovieController::class);

Route::get('/tasks/duethismonth', [TaskController::class, 'duethismonth']);
Route::resource('tasks', TaskController::class)->only(['index']);
Route::resource('tasks', TaskController::class)->only(['show','create','store','edit','update','destroy']) ->middleware('auth');

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
