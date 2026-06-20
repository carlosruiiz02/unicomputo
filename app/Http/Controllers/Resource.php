<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Resource extends Controller
{
    // Trae los productos de la sesión (o un arreglo vacío si no existen aún)
    private function obtenerProductos()
    {
        return session('productos', []);
    }

    // Guarda el arreglo de productos en la sesión
    private function guardarProductos($productos)
    {
        session(['productos' => $productos]);
    }

    // Vista de invitado (sin botones de editar/eliminar)
    public function indexInvitado()
    {
        $productos = $this->obtenerProductos();
        return view('principal_b', compact('productos'));
    }

    // Vista de usuario logueado (con CRUD completo)
    public function index()
    {
        $productos = $this->obtenerProductos();
        return view('principal_a', compact('productos'));
    }

    public function create()
    {
        return view('crear_producto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|max:150',
            'precio'    => 'required|numeric',
            'cantidad'  => 'required|integer',
            'categoria' => 'required|max:100',
        ]);

        $productos = $this->obtenerProductos();

        // Generar código autoincremental simulado
        $nuevoCodigo = count($productos) > 0
            ? max(array_column($productos, 'codigo')) + 1
            : 1;

        $productos[] = [
            'codigo'    => $nuevoCodigo,
            'nombre'    => $request->nombre,
            'precio'    => $request->precio,
            'cantidad'  => $request->cantidad,
            'categoria' => $request->categoria,
        ];

        $this->guardarProductos($productos);

        return redirect()->route('productos.index');
    }

    public function edit($codigo)
    {
        $productos = $this->obtenerProductos();
        $producto = collect($productos)->firstWhere('codigo', (int) $codigo);

        if (!$producto) {
            abort(404);
        }

        return view('editar_producto', compact('producto'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre'    => 'required|max:150',
            'precio'    => 'required|numeric',
            'cantidad'  => 'required|integer',
            'categoria' => 'required|max:100',
        ]);

        $productos = $this->obtenerProductos();

        foreach ($productos as &$producto) {
            if ($producto['codigo'] == $codigo) {
                $producto['nombre']    = $request->nombre;
                $producto['precio']    = $request->precio;
                $producto['cantidad']  = $request->cantidad;
                $producto['categoria'] = $request->categoria;
                break;
            }
        }

        $this->guardarProductos($productos);

        return redirect()->route('productos.index');
    }

    public function destroy($codigo)
    {
        $productos = $this->obtenerProductos();

        $productos = array_filter($productos, function ($producto) use ($codigo) {
            return $producto['codigo'] != $codigo;
        });

        $this->guardarProductos(array_values($productos));

        return redirect()->route('productos.index');
    }
}