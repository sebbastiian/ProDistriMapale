<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelHasRoles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Rules\Password;
use Illuminate\Validation\Rule;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        // Pasar los usuarios a la vista INDEX
        return view('administrador/administradores', ['users' => $users]);
    }
    public function index2()
    {
        $usuarios = User::all();

        // Pasar los usuarios a la vista CLIENTES
        return view('administrador/clientes', ['usuarios' => $usuarios]);
    }
    public function index3()
    {
        $users = User::all();

        // Pasar los usuarios a la vista TRANSPORTADORES
        return view('administrador/transportadores', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrador/transportadores/create');
    }
    public function create2()
    {
        //
        return view('administrador/transportadores/createa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validar los campos del formulario usando $request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'tipodocumento' => $request->input('tipodocumento'),
            'documento' => $request->input('documento'),
            'sueldo' => $request->input('sueldo'),
            'estado' => $request->input('estado'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'password' => Hash::make($request->input('password')),
            'roles_id' => $request->input('roles_id'),
        ]);

        
  // Asegúrate de que los datos están presentes y obtén el valor de roles_id
  $rolesId = $request->input('roles_id');

  // Obtén el último ID de usuario
  $ultimoId = User::latest()->first()->id;

  // Crea un nuevo ModelHasRoles
  $rolando = ModelHasRoles::create([
    'role_id' => $rolesId,
    'model_type' => 'App\Models\User',
    'model_id' => $ultimoId,
]);
        $user->save();

        return redirect()->route('administrador.transportadores');    
        
    }
    public function store2(Request $request)
    {
        //
        // Validar los campos del formulario usando $request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'tipodocumento' => $request->input('tipodocumento'),
            'documento' => $request->input('documento'),
            'sueldo' => $request->input('sueldo'),
            'estado' => $request->input('estado'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'password' => Hash::make($request->input('password')),
            'roles_id' => $request->input('roles_id'),
        ]);

        
        
  // Asegúrate de que los datos están presentes y obtén el valor de roles_id
  $rolesId = $request->input('roles_id');

  // Obtén el último ID de usuario
  $ultimoId = User::latest()->first()->id;

  // Crea un nuevo ModelHasRoles
  $rolando = ModelHasRoles::create([
    'role_id' => $rolesId,
    'model_type' => 'App\Models\User',
    'model_id' => $ultimoId,
]);

        $user->save();

        return redirect()->route('administrador.transportadores')->with('success', 'Usuario creado exitosamente');    
        
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
// ...

public function edit(string $id)
{
    $users = User::find($id);
    return view('administrador.transportadores.edit', ['users'=>$users]);
}

public function update(Request $request, string $id)
{
    $users = User::findOrFail($id);
    $users->update($request->all());
    $users->save();
    return redirect()->route('administrador.transportadores');
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
