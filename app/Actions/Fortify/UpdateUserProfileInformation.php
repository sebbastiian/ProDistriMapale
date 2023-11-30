<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'nombretienda' => ['string', 'max:255'], 
            'apellido' => ['required', 'string', 'max:255'], // Agregar el campo "apellido"
            'telefono' => ['required', 'string', 'max:20'], // Agregar el campo "telefono"
            'direccion' => ['required', 'string', 'max:255'], // Agregar el campo "direccion"
            'documento' => ['required', 'string', 'max:20'], // Agregar el campo "documento"
            'tipodocumento' => ['required', 'string', 'max:20'], // Agregar el campo "tipodocumento"
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'nombretienda' => $input['nombretienda'],
                'email' => $input['email'],
                'apellido' => $input['apellido'], // Actualizar el campo "apellido"
                'telefono' => $input['telefono'], // Actualizar el campo "telefono"
                'direccion' => $input['direccion'], // Actualizar el campo "direccion"
                'documento' => $input['documento'], // Actualizar el campo "documento"
                'tipodocumento' => $input['tipodocumento'], // Actualizar el campo "tipodocumento"
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'nombretienda' => $input['nombretienda'],
            'email' => $input['email'],
            'apellido' => $input['apellido'], // Actualizar el campo "apellido"
            'telefono' => $input['telefono'], // Actualizar el campo "telefono"
            'direccion' => $input['direccion'], // Actualizar el campo "direccion"
            'documento' => $input['documento'], // Actualizar el campo "documento"
            'tipodocumento' => $input['tipodocumento'], // Actualizar el campo "tipodocumento"
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
