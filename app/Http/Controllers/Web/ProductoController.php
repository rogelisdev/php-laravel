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
        $data = $request->validated();

        // 1. Subir imagen y guardar SOLO la ruta
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // 2. Crear el DTO con datos limpios (NO Request)
        $dto = new ProductoDTO(
            nombre: $data['nombre'],
            precio: (float) $data['precio'],
            descripcion: $data['descripcion'] ?? null,
            stock: (int) $data['stock'],
            category_id: (int) $data['category_id'],
            imagen: $data['imagen'] ?? null
        );

        // 3. Guardar producto
        $producto = new Producto($dto->toArray());
        $producto->user_id = Auth::id();
        $producto->save();

        return redirect()
            ->route('productos.index')
            ->with('success', '¡Producto creado con éxito!');
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
