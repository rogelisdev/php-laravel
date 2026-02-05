<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function byCategory($id)
{
    $products = Producto::where('category_id', $id)->get();
    $categories = Category::all();

    return view('products.index', compact('products', 'categories'));
}

}
