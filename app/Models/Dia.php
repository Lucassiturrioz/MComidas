<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'Dia';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Nombre'];


}
