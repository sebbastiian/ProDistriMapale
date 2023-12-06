<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['nit','fechahora','total','estado','descuento','impuesto'];
    protected $primaryKey ='idfactura';
}

