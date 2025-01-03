<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

class PedidoController extends Controller
{

    public function index(){
        return view('pedido.index',['pedidos'=>Pedido::all()]);
    }

    public function show(Pedido $pedido){

        return view('pedido.show',['pedido'=>$pedido,'clientes'=>$pedido->showPedido($pedido)]);
    }

}
