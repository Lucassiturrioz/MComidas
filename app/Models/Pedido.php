<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Double;

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

    public function Cuenta(): BelongsTo {
        return $this->belongsTo(Quincena::class,'Cuenta','ID');
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
                'cliente.ID',
                'cliente.Apodo',
                DB::raw('GROUP_CONCAT(producto.Nombre SEPARATOR ", ") AS Productos'),
                DB::raw('SUM(producto_pedido.total_pedido) AS TotalGastado')
            )
            ->where('producto_pedido.id_pedido', '=', $pedido->ID)
            ->groupBy('cliente.Apodo','cliente.ID')
            ->orderBy('cliente.Apodo')
            ->get();

        return $resultados;

    }

    public function modificarPrecio($Total_Pedido)
    {
       $this->Total_Dia += $Total_Pedido;
       $this->save();
    }

    public static function getFecha($fecha)
    {
        $pedido = Pedido::where('Fecha', $fecha)->first();

        if ($pedido == null && $fecha == now()->toDateString()) {
            return Pedido::crearPedido($fecha);
        }

        return $pedido;
    }


    public static function crearPedido($fecha)
    {
        $quincena = Quincena::get($fecha);

        if ($quincena == null) {
            $parametros = [
                'Fecha_Comienzo' => now()->toDateString(),
                'Fecha_Finalizacion' => now()->addDays(15)->toDateString(),
                'Total_Ganado' => 0
            ];
            Quincena::create($parametros);
            $quincena = Quincena::get($fecha);
        }

        $fechaActual = Carbon::now();
        $fechaActual->locale('es');
        $dia = $fechaActual->dayName;
        $mes = $fechaActual->monthName;


        $diaActual = Dia::where('Nombre', $dia)->first();
        $mesActual = Mes::where('Nombre', $mes)->first();


        return Pedido::create(['Fecha' => $fecha, 'Cuenta' => $quincena->ID, 'Dia'=>$diaActual->ID, 'Mes'=>$mesActual->ID, 'Total_Dia'=>0]);

    }



}
