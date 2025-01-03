<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'Cliente';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Nombre','Apellido','Apodo','Numero','Estado'];

    public static function checkApodo(String $Apodo): bool
    {
        return self::where('Apodo', $Apodo)->exists();
    }



}
