<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoPedido;
use App\Models\Quincena;
use App\Models\RegistroQuincenaCliente;
use Illuminate\Http\Request;

class ProductoPedidoController extends Controller
{

    public function create(Request $request, Cliente $cliente)
    {
        $pedido = Pedido::getFecha($request->fecha);

        if ($pedido === null) {
            return redirect()->back()->with('error', 'No existe pedido para esa fecha.');
        }

        $productos = Producto::allActivo();

        return view('productoPedido.create', ['cliente'=>$cliente, 'pedido'=>$pedido, 'productos'=>$productos]);
    }



    public function store(Request $request, Cliente $cliente, Pedido $pedido)
    {
        $datos = $request->validate([
            'ID_Producto' => 'required|exists:producto,ID',
            'Cantidad' => 'required|integer|min:1',
            'Total_Pedido' => 'required|numeric|min:0',
            'Estado' => 'required',
            'Precio_Actual' => 'required',
        ]);

        $datos['ID_Cliente'] = $cliente->ID;
        $datos['ID_Pedido'] = $pedido->ID;

        $this->actualizarProductoPedido($datos);

        if ($datos['Estado'] === 'Pagado') {
            return $this->handlePagado($pedido);
        }

        $this->actualizarRegistroQuincena($cliente, $pedido, $datos['Total_Pedido']);
        $pedido->modificarPrecio($datos['Total_Pedido']);

        return redirect("/pedidos/" . $pedido->ID)->with('success', 'Producto agregado al pedido con éxito.');
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


    private function handlePagado(Pedido $pedido)
    {
        return redirect("/pedidos/" . $pedido->ID)->with('info', 'El pedido ya está pagado. No se realizaron modificaciones.');
    }

    private function actualizarProductoPedido(array $datos)
    {
        $productoPedido = ProductoPedido::where([
            ['ID_Cliente', '=', $datos['ID_Cliente']],
            ['ID_Producto', '=', $datos['ID_Producto']],
            ['Estado', '=', $datos['Estado']],
        ])->first();

        if ($productoPedido) {
            $productoPedido->Cantidad += $datos['Cantidad'];
            $productoPedido->Total_Pedido += $datos['Total_Pedido'];
            $productoPedido->save();
        } else {
            ProductoPedido::create($datos);
        }
    }


    private function actualizarRegistroQuincena(Cliente $cliente, Pedido $pedido,  $totalPedido)
    {
        $registroQuincenaCliente = RegistroQuincenaCliente::where([
            ['ID_Cliente', '=', $cliente->ID],
            ['ID_Cuenta', '=', $pedido->Cuenta],
        ])->first();

        if ($registroQuincenaCliente) {
            $registroQuincenaCliente->Total_Quincena += $totalPedido;
            $registroQuincenaCliente->save();
        } else {
            RegistroQuincenaCliente::create([
                'ID_Cliente' => $cliente->ID,
                'ID_Cuenta' => $pedido->Cuenta,
                'Total_Quincena' => $totalPedido,
            ]);
        }

        $quincena = Quincena::where('ID', $pedido->Cuenta)->first();
        $quincena?->increment('Total_ganado', $totalPedido);
    }




}

