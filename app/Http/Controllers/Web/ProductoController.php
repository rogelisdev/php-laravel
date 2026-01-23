<?php

namespace App\Http\Controllers\Web;

use App\DTOs\ProductoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::paginate(5);
        return view('productos.index', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }


    public function store(StoreProductoRequest $request)
    {
        $dto = ProductoDTO::fromRequest($request);

        Producto::create($dto->toArray());

        // Redirige a la lista con mensaje flash
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
        return view('productos.edit', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $dto = ProductoDTO::fromRequest($request);

        $producto->update($dto->toArray());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }


    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado');
    }
}
