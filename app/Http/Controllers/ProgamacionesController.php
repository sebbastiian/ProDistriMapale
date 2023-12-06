<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programaciones;
use App\Models\Vehiculos;
use App\Models\User;
use DB;

class ProgamacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programaciones = DB::table('programaciones')
            ->join('users', 'users.id', '=', 'programaciones.idtrasnportador')
            ->join('vehiculos', 'vehiculos.idvehiculo', '=', 'programaciones.idvehiculo')
            ->select(DB::raw("CONCAT(vehiculos.marca, ' ', vehiculos.modelo) AS nombre"), DB::raw("CONCAT(users.name, ' ', users.apellido) AS nombrecompleto"), 'programaciones.idprogramacion', 'programaciones.fecha', 'programaciones.observaciones', 'vehiculos.idvehiculo', 'vehiculos.placa', 'users.id')
            ->orderBy('programaciones.fecha', 'ASC') // Cambiado a 'programaciones.fecha', ajusta según tus necesidades
            ->get(); // Agregado para ejecutar la consulta y obtener los resultados
    
        return view('administrador/programaciones', ['programaciones' => $programaciones]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id', 'ASC')
        ->select(DB::raw("CONCAT(name, ' ', apellido) AS nombrecompleto"), 'users.id')
        ->get();

      

        $vehiculos = Vehiculos::orderBy('idvehiculo', 'ASC')
            ->select(DB::raw("CONCAT(modelo, ' (', placa, ')') AS nombre"), 'vehiculos.idvehiculo')
            ->get();
    
        return view('administrador/cronograma/create', ['users' => $users, 'vehiculos' => $vehiculos]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la fecha para asegurarse de que no sea anterior a la fecha actual
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
        ]);
    
        // Verificar si ya existe un registro con el vehículo y usuario en la fecha dada
        $existente = Programaciones::where('idvehiculo', $request->idvehiculo)
        ->where('idprogramacion', $request->idprogramacion)
        ->where('fecha', $request->fecha)
        ->exists();
    
    
        if ($existente) {
            return redirect()->route('administrador.programaciones.create')->with('error', 'Ya existe un registro para este vehículo y usuario en la fecha seleccionada.');
        }
    
        // Crear una nueva instancia de Programaciones
        $programaciones = new Programaciones();
    
        // Asignar valores a las propiedades
        $programaciones->idvehiculo = $request->idvehiculo;
        $programaciones->fecha = $request->fecha;
        $programaciones->observaciones = $request->observaciones;
        $programaciones->idtransportador = $request->id;  // Asumí que el nombre de la propiedad es 'idtransportador'
    
        // Guardar el registro en la base de datos
        $programaciones->save();
    
        return redirect()->route('administrador.programaciones')->with('success', 'Registro guardado exitosamente.');
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
        $programaciones = Programaciones :: findOrFail($id);
        $users = User::orderBy('id', 'ASC')
        ->select(DB::raw("CONCAT(name, ' ', apellido) AS nombrecompleto"), 'users.id')
        ->get();

        $vehiculos = Vehiculos::orderBy('idvehiculo', 'ASC')
            ->select(DB::raw("CONCAT(modelo, ' (', placa, ')') AS nombre"), 'vehiculos.idvehiculo')
            ->get();

        return view('administrador.cronograma.edit')->with('programaciones',$programaciones)->with('vehiculos',$vehiculos)->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $programaciones = Programaciones::findOrFail($id);
        $programaciones->update($request->all());
        $programaciones->save();
        return redirect()->route('administrador.programaciones');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
