<?php
use App\Http\Controllers\Web\ProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ruta pública
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas protegidas
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Productos
    Route::prefix('productos')->group(function () {

        // Mostrar lista de productos (admin ve todos, user ve solo los suyos)
        Route::get('/', [ProductoController::class, 'index'])->name('productos.index');

        // Crear producto
        Route::get('/create', [ProductoController::class, 'create'])->name('productos.create');
        Route::post('/', [ProductoController::class, 'store'])->name('productos.store');

        // Editar producto
        Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
        Route::put('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
        Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

        // Mostrar producto
        Route::get('/{producto}', [ProductoController::class, 'show'])->name('productos.show');
    });

    // Usuarios → solo admin
    Route::get('/usuarios', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'No tienes permiso para ver usuarios');
        }
        return app(UserController::class)->index();
    })->name('usuarios.index');
});


