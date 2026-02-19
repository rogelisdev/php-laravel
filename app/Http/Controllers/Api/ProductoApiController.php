<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    public function index()
    {
        return response()->json(Producto::all(), 200);
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'nombre' => 'required|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
    ]);

    $validated['user_id'] = auth()->id();

    $producto = Producto::create($validated);

    return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->update($request->all());

        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }
}
