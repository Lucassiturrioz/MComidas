<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    protected $table = 'Pedido';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Fecha','Dia','Mes','Cuenta','Total_Dia'];

    public function Dia(): BelongsTo {
        return $this->belongsTo(Dia::class,'Dia','ID');
    }
    public function Mes(): BelongsTo {
        return $this->belongsTo(Mes::class,'Mes','ID');
    }

    public function ProductoPedido()
    {
        return $this->hasMany(ProductoPedido::class, 'ID_Pedido','ID');
    }

    public function showPedido(Pedido $pedido)
    {
        $resultados = DB::table('producto_pedido')
            ->join('cliente', 'producto_pedido.id_cliente', '=', 'cliente.ID')
            ->join('producto', 'producto_pedido.id_producto', '=', 'producto.ID')
            ->select(
                'cliente.Apodo',
                DB::raw('GROUP_CONCAT(producto.Nombre SEPARATOR ", ") AS Productos'),
                DB::raw('SUM(producto_pedido.total_pedido) AS TotalGastado')
            )
            ->where('producto_pedido.id_pedido', '=', $pedido->ID)
            ->groupBy('cliente.Apodo')
            ->orderBy('cliente.Apodo')
            ->get();

        return $resultados;

    }

}
