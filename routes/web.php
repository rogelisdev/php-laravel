<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])-> name('home.index');

Route::get('/prueba', function (){
    return 'Esto es una prueba';
});

// index
Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index');

// create (SIEMPRE antes de {id})
Route::get('/productos/crear', [ProductoController::class, 'create'])
    ->name('productos.create');

// store
Route::post('/productos', [ProductoController::class, 'store'])
    ->name('productos.store');

// show
Route::get('/productos/{id}', [ProductoController::class, 'show'])
    ->name('productos.show');

// edit
Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])
    ->name('productos.edit');

// update
Route::put('/productos/{id}', [ProductoController::class, 'update'])
    ->name('productos.update');

// destroy
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])
    ->name('productos.destroy');


