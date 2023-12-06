<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipos;

class EditarTiposController extends Controller
{
    //
    public function edit(string $id)
    {
        //
        $tipos = Tipos::findOrFail($id);
        return view('administrador.tipos.edit',['tipos'=>$tipos]);
    }
    
    public function update(Request $request, string $id)
    {
        // En lugar de 'findOrFail', puedes usar 'find' para obtener un modelo o null
        $tipos = Tipos::find($id);

        $tipos->update($request->all());

        return redirect()->route('administrador.inventario');
    }

}
