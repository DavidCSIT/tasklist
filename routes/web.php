<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/balaram', function () {
    return view('balaram');
});

Route::get('/amanda', function () {
    return view('amanda');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('tasks', TaskController::class);
