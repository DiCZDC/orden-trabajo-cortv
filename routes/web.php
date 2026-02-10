<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    InicioController,
    DashboardController,
    ProyectoController,
    PersonalController,
    OrdenController,
    pdfController,
    ProductorController,
};

Route::get('/', [InicioController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Ruta del dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//Rutas de proyectos
Route::get('/proyectos', [ProyectoController::class, 'index'])->middleware(['auth', 'verified'])->name('proyectos.index');
Route::get('proyectos/{id}', [ProyectoController::class, 'show'])->middleware(['auth', 'verified'])->name('proyectos.show');

//Rutas de personal 
Route::get('/personal', [PersonalController::class, 'index'])->middleware(['auth', 'verified'])->name('personal.index');
Route::get('personal/{id}', [PersonalController::class, 'show'])->middleware(['auth', 'verified'])->name('personal.show');

//Ruta para generar PDF de orden de trabajo
Route::get('ordenes/pdf', [pdfController::class, 'generatePDF'])->middleware(['auth', 'verified'])->name('ordenes.pdf');

//Rutas de órdenes
Route::get('ordenes', [OrdenController::class, 'index'])->middleware(['auth', 'verified'])->name('ordenes.index');
Route::get('ordenes/{id}', [OrdenController::class, 'show'])->middleware(['auth', 'verified'])->name('ordenes.show');


//Rutas de productores
Route::get('productores', [ProductorController::class, 'index'])->middleware(['auth', 'verified'])->name('productores.index');


require __DIR__.'/auth.php';