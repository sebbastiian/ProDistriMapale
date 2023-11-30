<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipos;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipos = Tipos::orderBy('nombre', 'ASC')->get();
        //return $marcas;
        return view('administrador/inventario', ['tipos'=>$tipos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrador/tipos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Tipos::create(['nombre' =>request('nombre')]);
        return redirect()->route('administrador.inventario');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tipos = Tipos::findOrFail($id);
        return view('administrador.tipos.edit',['tipos'=>$tipos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tipos = Tipos::findOrFail($id);
        $tipos->update($request->all());
        $tipos->save();
        return redirect()->route('administrador.inventario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tipos = Tipos::findOrFail($id);
        $tipos->delete();
        return redirect()->route('administrador.inventario');
    }
}
