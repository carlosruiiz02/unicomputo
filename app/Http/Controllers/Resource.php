<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Resource extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|max:150',
            'precio'    => 'required|numeric',
            'cantidad'  => 'required|integer',
            'categoria' => 'required|max:100',
        ]);

        Producto::create([
            'nombre'    => $request->nombre,
            'precio'    => $request->precio,
            'cantidad'  => $request->cantidad,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('productos.index');
    }

    public function edit($codigo)
    {
        $producto = Producto::findOrFail($codigo);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre'    => 'required|max:150',
            'precio'    => 'required|numeric',
            'cantidad'  => 'required|integer',
            'categoria' => 'required|max:100',
        ]);

        $producto = Producto::findOrFail($codigo);
        $producto->update([
            'nombre'    => $request->nombre,
            'precio'    => $request->precio,
            'cantidad'  => $request->cantidad,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('productos.index');
    }

    public function destroy($codigo)
    {
        Producto::findOrFail($codigo)->delete();
        return redirect()->route('productos.index');
    }
}
