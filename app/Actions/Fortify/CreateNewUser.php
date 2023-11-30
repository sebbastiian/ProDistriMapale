<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\ModelHasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'nombretienda' => ['nullable', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'], // Agregar el campo "apellido"
            'telefono' => ['required', 'string', 'max:20'], // Agregar el campo "telefono"
            'direccion' => ['required', 'string', 'max:255'], // Agregar el campo "direccion"
            'documento' => ['required', 'string', 'max:20'], // Agregar el campo "documento"
            'tipodocumento' => ['required', 'string', 'max:20'], // Agregar el campo "tipodocumento"
            'roles_id' => ['required', 'int', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'nombretienda' => $input['nombretienda'],
            'apellido' => $input['apellido'], // Asignar el valor del campo "apellido"
            'telefono' => $input['telefono'], // Asignar el valor del campo "telefono"
            'direccion' => $input['direccion'], // Asignar el valor del campo "direccion"
            'documento' => $input['documento'], // Asignar el valor del campo "documento"
            'tipodocumento' => $input['tipodocumento'], // Asignar el valor del campo "tipodocumento"
            'roles_id' => $input['roles_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);




        // Asignar valores predeterminados para sueldo y estado según el rol
        if ($input['roles_id'] == 1 || $input['roles_id'] == 3) {
            $user->sueldo = 0; // Asignar valor predeterminado de sueldo
        }

        $ultimoid = User::all()->last()->id;
        $rolando = ModelHasRoles::create([
            'role_id' => $input['roles_id'],
            'model_type' => 'App\Models\User',
            'model_id' => $ultimoid,
        ]);

        $user->save();

        return $user;
    }

}
