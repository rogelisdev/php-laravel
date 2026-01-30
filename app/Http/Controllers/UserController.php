<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // traemos todos los usuarios
        return view('usuarios.index', compact('users'));
    }
}
