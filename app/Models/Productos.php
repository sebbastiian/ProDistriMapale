<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    
    protected $primaryKey ='idproducto';
    protected $fillable = ['idtipo','idmarca','descripcion','cantidad','contneto','unidadxempaque','disponibilidad','valor','imagen',];

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLikedByLoggedInUser(){
        return $this->likes->where('iduser',auth()->user()->id)->isEmpty() ? false : true ;
    }
}
