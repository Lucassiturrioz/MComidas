<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductoPedido extends Model
{
    protected $table = 'producto_pedido';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['ID_Producto','ID_Pedido','ID_Cliente','Total_Pedido','Cantidad'];

    public function Pedido(): BelongsTo {
        return $this->belongsTo(Pedido::class,'ID_Pedido','ID');
    }

    public function Cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class,'ID_Cliente','ID');
    }

    public function Producto(): BelongsTo {
        return $this->belongsTo(Producto::class,'ID_Producto','ID');
    }


}
