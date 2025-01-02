<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        return view('productos.index', ['productos'=>Producto::All()]);
    }

    public function create(){
        return view('productos.create',['categorias' => Categoria::all()]);
    }

    public function show(Producto $producto){
        return view('productos.show',['producto'=>$producto]);
    }

    public function store(Request $request){
        $datos = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Precio' => 'required|numeric|min:0',
            'Descripcion' => 'required',
            'Categoria' => 'required',
            'Tipo' => 'required',
            'Estado' => 'required',
        ], [
            "Nombre.required" => "¡Nombre del producto es obligatorio!",
            "Precio.required" => "¡Precio del producto es obligatorio!",
            "Descripcion.required" => "¡Descripción del producto es obligatoria!",
            "Categoria.required" => "¡Categoría del producto es obligatorio!"
        ]);

        Producto::create($datos);

        return redirect()->back()->with('success', 'Producto creado exitosamente!');

    }

    public function edit(Producto $producto){

        return view('productos.edit',['producto'=>$producto, 'categorias' => Categoria::all()]);
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->back()->with('success', 'Producto editado exitosamente!');
    }

    public function destroy(Producto $producto){
        $producto->Estado = 'BAJA';
        $producto->save();
        return redirect()->back()->with('success', 'Producto eliminado exitosamente!');
    }

    public function activate(Producto $producto){
        $producto->Estado = 'ALTA';
        $producto->save();
        return redirect()->back()->with('success', 'Producto recuperado exitosamente!');
    }


}

