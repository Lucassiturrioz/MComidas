<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table = 'Mes';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Nombre'];

}
