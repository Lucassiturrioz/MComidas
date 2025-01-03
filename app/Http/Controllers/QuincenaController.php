<?php

namespace App\Http\Controllers;

use App\Models\Quincena;
use App\Models\RegistroQuincenaCliente;

class QuincenaController extends Controller
{
    public function index(){
        return view('quincena.index',['quincenas'=> Quincena::all()]);
    }

    public function show(Quincena $quincena){
        $registroClientes = RegistroQuincenaCliente::where('ID_Cuenta', $quincena->ID)->get();

        return view('quincena.show',['quincena'=> $quincena,'registroClientes'=>$registroClientes]);

    }

}
