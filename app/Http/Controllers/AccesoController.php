<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesoController extends Controller
{
    public function bienvenido()
    {
        return view('bienvenido');
    }

    public function mostrarLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        session(['usuario' => $request->nombre]);

        return redirect()->route('productos.index');
    }
}