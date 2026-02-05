<?php

namespace App\Http\Controllers\Web;

use App\DTOs\ProductoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Category;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    // Index general → admin ve todos, usuario normal ve solo los suyos
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $productos = Producto::paginate(5);
        } else {
            $productos = Producto::where('user_id', Auth::id())->paginate(5);
        }

        return view('productos.index', compact('productos'));
    }

    // Crear producto → asignamos user_id automáticamente
    public function store(StoreProductoRequest $request)
    {
        // 1. Transformamos el request validado en un DTO
        $dto = ProductoDTO::fromRequest($request);

        // 2. Creamos la instancia con los datos del DTO
        $producto = new Producto($dto->toArray());

        // 3. Asignamos manualmente los campos de auditoría o relación directa
        $producto->user_id = Auth::id();

        // 4. Guardamos en la base de datos
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function create()
    {
        // Cargamos las categorías para el formulario de creación
        $categories = Category::all();

        return view('productos.create', compact('categories'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        // Verificación de permisos
        if (Auth::user()->role !== 'admin' && $producto->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este producto.');
        }

        // Cargamos las categorías también para la edición
        $categories = Category::all();

        return view('productos.edit', compact('producto', 'categories'));
    }

    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $producto->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este producto.');
        }

        $dto = ProductoDTO::fromRequest($request);
        $producto->update($dto->toArray());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $producto->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este producto.');
        }

        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $producto->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este producto.');
        }

        return view('productos.show', compact('producto'));
    }
}
