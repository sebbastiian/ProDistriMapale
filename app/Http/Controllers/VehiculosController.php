<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehiculos = Vehiculos::all();

        // Pasar los usuarios a la vista
        return view('administrador/vehiculos', ['vehiculos' => $vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrador/vehiculos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehiculos = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'placa' => 'required',
            'estado' => 'required',
        ]);
    
        Vehiculos::create($vehiculos);
    
        return redirect()->route('administrador.vehiculos');
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
        $vehiculos = Vehiculos::findOrFail($id);
        return view('administrador.vehiculos.edit',['vehiculos'=>$vehiculos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $vehiculos = Vehiculos::findOrFail($id);
        $vehiculos->update($request->all());
        $vehiculos->save();
        return redirect()->route('administrador.vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
