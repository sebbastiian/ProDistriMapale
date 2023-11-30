<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas;
use DB;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $marcas = Marcas::orderBy('nombre', 'ASC')->get();
        //return $marcas;
        return view('administrador/inventario', ['marcas'=>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrador/marcas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Marcas::create(['nombre' =>request('nombre')]);
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
        $marcas = Marcas::findOrFail($id);
        return view('administrador.marcas.edit',['marcas'=>$marcas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $marcas = Marcas::findOrFail($id);
        $marcas->update($request->all());
        $marcas->save();
        return redirect()->route('administrador.inventario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $marcas = Marcas::findOrFail($id);
        $marcas->delete();
        return redirect()->route('administrador.inventario');
    }
}
