<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroQuincenaCliente extends Model
{
    protected $table = 'registro_quincena_cliente';
    protected $primaryKey = 'ID';
    public $timestamps = false;


    protected $fillable = ['ID_Cliente', 'ID_Cuenta', 'Estado', 'Total_Quincena'];

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function Quincena()
    {
        return $this->belongsTo(Quincena::class, 'ID_Cuenta');
    }
}
