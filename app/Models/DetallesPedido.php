<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesPedido extends Model
{
    use HasFactory;
    protected $primaryKey ='iddetallepedido';
    protected $fillable = ['idpedido','idproducto','valorunitario','cantidadsolicitada'];
}
