<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;
    protected $fillable = ['idvehiculo','placa','marca','modelo','estado'];
    protected $primaryKey ='idvehiculo';
}
