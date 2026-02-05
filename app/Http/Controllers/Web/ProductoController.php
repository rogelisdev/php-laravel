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

    // 1. Manejar la subida de la imagen si existe
    if ($request->hasFile('imagen')) {
        // Guardar en storage/app/public/productos y obtener la ruta
        $path = $request->file('imagen')->store('productos', 'public');
        $data['imagen_path'] = $path;
    }

    // 2. Crear DTO con la ruta de la imagen incluida
    $dto = ProductoDTO::fromRequest($request->merge(['imagen_path' => $data['imagen_path'] ?? null]));

    // 3. Crear producto y asignar usuario
    $producto = new Producto($dto->toArray());
    $producto->user_id = Auth::id();
    $producto->save();

    return redirect()->route('productos.index')->with('success', '¡Producto creado con éxito!');
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
