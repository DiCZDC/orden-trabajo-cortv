<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/proyectos', function () {
    return view('proyectos');
})->middleware(['auth', 'verified'])->name('proyectos');
Route::get('/personal', function () {
    return view('personal');
})->middleware(['auth', 'verified'])->name('personal');
Route::get('ordenes', function () {
    return view('orden');
})->middleware(['auth', 'verified'])->name('ordenes');
Route::get('/registro/personal', function () {
    return view('registro.personal');
})->middleware(['auth', 'verified'])->name('registro.personal');
require __DIR__.'/auth.php';
