<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class productoController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();

        return view('form', ['producto' => $request->nombre]);
    }

    public function showProducts(){
        $products = Producto::all();
        return view('producto',compact('products'));
    }


    public function showProductsApi(){
        $products = Producto::all();
        return response()->json($products);
    }

}
