<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoPedido;
use Illuminate\Http\Request;


class PedidoController extends Controller
{

    public function index(){
        return view('pedido.index',['pedidos'=>Pedido::all()]);
    }

    public function show(Pedido $pedido){

        return view('pedido.show',['pedido'=>$pedido,'clientes'=>$pedido->showPedido($pedido)]);
    }

    public function seleccionarFecha(Cliente $cliente)
    {
        return view('pedido.seleccionarFecha',['cliente'=>$cliente]);
    }






}
