<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Resource extends Controller
{
    // Trae los productos de la sesión (o un arreglo vacío si no existen aún)
    private function obtenerProductos()
    {
    if (!session()->has('productos')) {
        session(['productos' => $this->productosIniciales()]);
        }

        return session('productos', []);
    }

    private function productosIniciales()
    {
        return [
            ['codigo' => 1,  'nombre' => 'Procesador Intel Core i7 13700K',        'precio' => 1850000.00, 'cantidad' => 8,  'categoria' => 'Componentes'],
            ['codigo' => 2,  'nombre' => 'Memoria RAM Kingston Fury 16GB DDR4',    'precio' => 280000.00,  'cantidad' => 25, 'categoria' => 'Componentes'],
            ['codigo' => 3,  'nombre' => 'SSD NVMe Samsung 980 1TB',               'precio' => 420000.00,  'cantidad' => 20, 'categoria' => 'Componentes'],
            ['codigo' => 4,  'nombre' => 'Tarjeta gráfica NVIDIA RTX 4070',        'precio' => 3200000.00, 'cantidad' => 5,  'categoria' => 'Componentes'],
            ['codigo' => 5,  'nombre' => 'Fuente de poder EVGA 650W',              'precio' => 380000.00,  'cantidad' => 14, 'categoria' => 'Componentes'],
            ['codigo' => 6,  'nombre' => 'Mouse gamer Logitech G502',              'precio' => 195000.00,  'cantidad' => 22, 'categoria' => 'Perifericos'],
            ['codigo' => 7,  'nombre' => 'Teclado mecánico Razer BlackWidow',      'precio' => 320000.00,  'cantidad' => 18, 'categoria' => 'Perifericos'],
            ['codigo' => 8,  'nombre' => 'Monitor LG 27 pulgadas 144Hz',           'precio' => 980000.00,  'cantidad' => 10, 'categoria' => 'Perifericos'],
            ['codigo' => 9,  'nombre' => 'Audífonos gamer HyperX Cloud',           'precio' => 280000.00,  'cantidad' => 20, 'categoria' => 'Perifericos'],
            ['codigo' => 10, 'nombre' => 'Webcam Logitech C920',                   'precio' => 220000.00,  'cantidad' => 15, 'categoria' => 'Perifericos'],
            ['codigo' => 11, 'nombre' => 'Hub USB-C 7 en 1',                       'precio' => 130000.00,  'cantidad' => 25, 'categoria' => 'Accesorios'],
            ['codigo' => 12, 'nombre' => 'Cable HDMI 2.1 2 metros',                'precio' => 38000.00,   'cantidad' => 45, 'categoria' => 'Accesorios'],
            ['codigo' => 13, 'nombre' => 'Router WiFi 6 TP-Link',                  'precio' => 280000.00,  'cantidad' => 12, 'categoria' => 'Accesorios'],
            ['codigo' => 14, 'nombre' => 'Batería UPS 600VA',                      'precio' => 220000.00,  'cantidad' => 10, 'categoria' => 'Accesorios'],
            ['codigo' => 15, 'nombre' => 'Memoria USB SanDisk 128GB',              'precio' => 65000.00,   'cantidad' => 40, 'categoria' => 'Accesorios'],
        ];
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

    public function apiIndex()
    {
        return response()->json($this->obtenerProductos());
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