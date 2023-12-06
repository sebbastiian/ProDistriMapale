<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $proveedores = Proveedores::orderBy('nombre', 'ASC')->get();
        //return $marcas;
        return view('administrador/proveedores', ['proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrador/proveedor/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $proveedores = $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required'
        ]);
    
        Proveedores::create($proveedores);
    
        return redirect()->route('administrador.proveedores');
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
        $proveedores = Proveedores::findOrFail($id);
        return view('administrador.proveedor.edit',['proveedores'=>$proveedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $proveedores = Proveedores::findOrFail($id);
        $proveedores->update($request->all());
        $proveedores->save();
        return redirect()->route('administrador.proveedores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
