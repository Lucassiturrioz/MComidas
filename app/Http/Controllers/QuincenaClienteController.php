<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\RegistroQuincenaCliente;
use Illuminate\Http\Request;

class QuincenaClienteController extends Controller
{
    public function edit(RegistroQuincenaCliente $registro){
        return view('quincenaCliente.edit',['registro'=>$registro]);
    }

    public function update(Request $request, RegistroQuincenaCliente $registro)
    {
        $registro->update($request->all());
        return redirect()->back()->with('success', 'Actualizacion de pago completo!');
    }

    public function show(RegistroQuincenaCliente $registro)
    {
        // Obtenemos los pedidos que corresponden al cliente
        $pedidos = Pedido::join('producto_pedido', 'pedido.ID', '=', 'producto_pedido.ID_Pedido')
            ->join('producto', 'producto_pedido.ID_Producto', '=', 'producto.ID')
            ->where('pedido.Cuenta', $registro->ID_Cuenta)
            ->where('producto_pedido.ID_Cliente', $registro->ID_Cliente)
            ->select('pedido.Fecha', 'producto.nombre as producto', 'producto_pedido.Total_Pedido')
            ->get();

        $pedidosAgrupados = $pedidos->groupBy('Fecha');

        $mapPedidos = $pedidosAgrupados->map(function ($grupo) {
            $productos = $grupo->pluck('producto')->implode(', ');
            $total = $grupo->sum('Total_Pedido');
            return [
                'productos' => $productos,
                'total' => $total,
            ];
        });

        return view('quincenaCliente.show', ['registro' => $registro, 'mapPedidos' => $mapPedidos]);
    }

}
