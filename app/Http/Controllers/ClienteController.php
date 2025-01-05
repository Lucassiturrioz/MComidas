<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\RegistroQuincenaCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        return view('cliente.index',['clientes'=>Cliente::all()]);
    }

    public function show(Cliente $cliente)
    {
        $quincenas = RegistroQuincenaCliente::where('ID_Cliente',$cliente->ID)->where('Estado','No Pago')->get();

        return view('cliente.show', ['cliente' => $cliente, 'quincenas' => $quincenas]);
    }


    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        $datos = $request->validate([
            'Nombre' => 'required|string|min:4|max:255',
            'Apellido' => 'required|string|min:4|max:255',
            'Apodo' => 'required',
            'Numero' => 'required',
            'Estado' => 'required',
        ], [
            "Nombre.required" => "¡Nombre es obligatorio!",
            "Apellido.required" => "¡Apellido es obligatorio!",
            "Apodo.required" => "¡Descripción es obligatorio!",
            "Numero.required" => "¡Categoría es obligatorio!"
        ]);

        if(Cliente::checkApodo($request->Apodo)){
            return redirect()->back()->with('error', 'El apodo ingresado ya está en uso.');
        }

        Cliente::create($datos);

        return redirect()->back()->with('success', 'Usuario creado exitosamente!');
    }

    public function edit(Cliente $cliente){
        return view('cliente.edit',['cliente'=>$cliente]);
    }

    public function update(Request $request, Cliente $cliente){
        $cliente->update($request->all());
        return redirect()->back()->with('success', 'Cliente editado exitosamente!');
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
