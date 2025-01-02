<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Nombre','Descripcion','Precio', 'Categoria','Tipo','Estado'];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class,'Categoria','ID');
    }

}
