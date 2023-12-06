<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesFactura extends Model
{
    use HasFactory;
    protected $fillable = ['idfactura','idproducto','cantidad','valorunitario','valortotal','importe'];
    
}