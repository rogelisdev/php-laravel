<?php

namespace App\Http\Controllers\Web;

use App\DTOs\ProductoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
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
        $dto = ProductoDTO::fromRequest($request);

        $producto = new Producto($dto->toArray());
        $producto->user_id = Auth::id();
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function create()
    {
        return view('productos.create');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $producto->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este producto.');
        }

        return view('productos.edit', compact('producto'));
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
