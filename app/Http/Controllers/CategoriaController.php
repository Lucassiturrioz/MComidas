<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        return view('categoria.index', ['categorias'=>Categoria::All()]);
    }
    public function show(Categoria $categoria){
        return view('categoria.show', ['categoria'=>$categoria]);
    }

}
