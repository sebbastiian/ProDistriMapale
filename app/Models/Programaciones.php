<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programaciones extends Model
{
    use HasFactory;
    protected $primaryKey ='idprogramacion';
    protected $fillable = ['idvehiculo','idtrasnportador','fecha','observaciones'];

}
