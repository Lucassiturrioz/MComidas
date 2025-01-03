<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\ProductoPedido;
use App\Models\Quincena;
use App\Models\RegistroQuincenaCliente;
use Illuminate\Http\Request;

class ProductoPedidoController extends Controller
{

    public function store(Request $request, Cliente $cliente, Pedido $pedido)
    {
        $datos = $request->validate([
            'ID_Producto' => 'required|exists:producto,ID',
            'Cantidad' => 'required|integer|min:1',
            'Total_Pedido' => 'required|numeric|min:0',
        ]);

        $datos['ID_Cliente'] = $cliente->ID;
        $datos['ID_Pedido'] = $pedido->ID;

        $productoPedido = ProductoPedido::where([
            ['ID_Cliente', '=', $datos['ID_Cliente']],
            ['ID_Producto', '=', $datos['ID_Producto']],
        ])->first();

        if($productoPedido != null){
            $productoPedido->Cantidad += $datos['Cantidad'];
            $productoPedido->Total_Pedido += $datos['Total_Pedido'];
            $productoPedido->save();
        } else {
            ProductoPedido::create($datos);
        }

        $registroQuincenaCliente = RegistroQuincenaCliente::where([
            ['ID_Cliente', '=', $cliente->ID],
            ['ID_Cuenta', '=', $pedido->Cuenta],
        ])->first();

        $quincena = Quincena::where([
            ['ID', '=', $pedido->Cuenta],
        ])->first();

        if ($registroQuincenaCliente == null) {
            RegistroQuincenaCliente::create([
                'ID_Cliente' => $cliente->ID,
                'ID_Cuenta' => $pedido->Cuenta,
                'Total_Quincena' => $datos['Total_Pedido'],
            ]);
        } else{
            $registroQuincenaCliente->Total_Quincena += $datos['Total_Pedido'];
            $registroQuincenaCliente->save();

        }

        $quincena->increment('Total_ganado', $datos['Total_Pedido']);
        $quincena->save();

        $pedido->modificarPrecio($datos['Total_Pedido']);

        return redirect("/pedidos/".$pedido->ID)->with('success', 'Producto agregado al pedido con éxito.');
    }

    public function destroy(ProductoPedido $productoPedido)
    {
        $productoPedido->pedido->modificarPrecio(-$productoPedido->Total_Pedido);
        $productoPedido->delete();

        $registroQuincenaCliente = RegistroQuincenaCliente::where([
            ['ID_Cliente', '=', $productoPedido->Cliente->ID],
            ['ID_Cuenta', '=', $productoPedido->pedido->Cuenta],
        ])->first();

        $quincena = Quincena::where([
            ['ID', '=', $productoPedido->pedido->Cuenta],
        ])->first();

        $registroQuincenaCliente->Total_Quincena -= $productoPedido->Total_Pedido;
        $registroQuincenaCliente->save();

        $quincena->decrement('Total_ganado', $productoPedido->Total_Pedido);
        $quincena->save();

        return redirect()->back()->with('success', 'Producto pedido eliminado con exito.');
    }

    public function show(Cliente $cliente, Pedido $pedido) {
        $productos_pedidos = ProductoPedido::where('ID_Pedido', $pedido->ID)
            ->where('ID_Cliente', $cliente->ID)
            ->get();

        return view('productoPedido.show', compact('pedido', 'cliente', 'productos_pedidos'));
    }


}

