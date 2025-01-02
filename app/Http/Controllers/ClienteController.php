<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        return view('cliente.index',['clientes'=>Cliente::all()]);
    }

    public function show(Cliente $cliente){
        return view('cliente.show',['cliente'=>$cliente]);
    }

    public function destroy(Cliente $cliente){
        $cliente->Estado = 'Desactivado';
        $cliente->save();
        return redirect()->back()->with('success', 'Cliente eliminado exitosamente!');
    }

    public function activate(Cliente $cliente){
        $cliente->Estado = 'Activo';
        $cliente->save();
        return redirect()->back()->with('success', 'Cliente recuperado exitosamente!');
    }

}
