<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index(){
        return view('productos.index');
    }

    public function show($id){
        return view('productos.show', ['id' => $id]);
    }

    public function create(){
        return view('productos.create');
    }

    public function store(){
        return view('productos.store');
    }

    public function edit($id){
        return view('productos.edit', ['id' => $id]);
    }

    public function update($id){
        return view('productos.update', ['id' => $id]);
    }

    public function destroy($id){
        return view('productos.destroy', ['id' => $id]);
    }
}
