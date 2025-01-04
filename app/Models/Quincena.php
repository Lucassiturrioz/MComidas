<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quincena extends Model
{
    protected $table = 'registro_quincena';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Fecha_Comienzo','Fecha_Finalizacion','Total_Ganado'];


    public static function get($fecha)
    {
        return self::where('Fecha_Comienzo', '<=', $fecha)
            ->where('Fecha_Finalizacion', '>=', $fecha)
            ->first();
    }
}
