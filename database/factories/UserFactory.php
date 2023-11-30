<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'nombretienda' => null, // Agregar el campo "nombretienda" con valor nulo
            'apellido' => $this->faker->apellido(), // Generar un apellido aleatorio
            'telefono' => $this->faker->telefono(), // Generar un número de teléfono aleatorio
            'direccion' => $this->faker->direccion(), // Generar una dirección aleatoria
            'documento' => $this->faker->documento(), // Generar un número de documento aleatorio
            'tipodocumento' => 'DNI', // Puedes cambiarlo según tus necesidades
            'sueldo' => 0, // Establecer sueldo por defecto en 0
            'estado' => null, // Establecer estado con valor nulo
            'roles_id' => 2, // Establecer rol de cliente por defecto (puedes cambiarlo según tus necesidades)
        ];
    }

    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function withPersonalTeam(callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
