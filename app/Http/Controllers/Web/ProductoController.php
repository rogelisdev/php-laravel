<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index(){
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function show($id){
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }


public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer'
    ]);

    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock
    ]);

    return redirect()->route('productos.index')
                     ->with('success', 'Producto creado exitosamente');
}


    public function create(){
        return view('productos.create');
    }

    public function edit($id){
    $producto = Producto::findOrFail($id);
    return view('productos.edit', compact('producto'));
    }


    public function update(Request $request, $id){
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer'
    ]);

    $producto = Producto::findOrFail($id);

    $producto->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock
    ]);

    return redirect()->route('productos.index')
                     ->with('success', 'Producto actualizado');
}


    public function destroy($id){
    Producto::destroy($id);

    return redirect()->route('productos.index')
                     ->with('success', 'Producto eliminado');
}

}
