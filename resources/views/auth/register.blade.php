<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <!-- Nombre tienda -->
            <div class="mt-4">
                <x-label for="nombretienda" value="{{ __('Nombre de la tienda') }}" />
                <x-input id="nombretienda" class="block mt-1 w-full" type="text" name="nombretienda" :value="old('nombretienda')" autofocus autocomplete="nombretienda" />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Apellido -->
            <div class="mt-4">
                <x-label for="apellido" value="{{ __('Apellido') }}" />
                <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Telefono -->
            <div class="mt-4">
                <x-label for="telefono" value="{{ __('Telefono') }}" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>

            <!-- Direccion -->
            <div class="mt-4">
                <x-label for="direccion" value="{{ __('Direccion') }}" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
            </div>

            <!-- Documento -->
            <div class="mt-4">
                <x-label for="documento" value="{{ __('Documento') }}" />
                <x-input id="documento" class="block mt-1 w-full" type="text" name="documento" :value="old('documento')" required autofocus autocomplete="documento" />
            </div>

            <!-- Tipo Documento -->
            <div class="mt-4">
                <x-label for="tipodocumento" value="{{ __('Tipo de Documento') }}" />
                <select id="tipodocumento" name="tipodocumento" class="block mt-1 w-full" value="{{ __('Tipo de Documento') }}"  :value="old('tipodocumento')" required autofocus autocomplete="tipodocumento">
                    <option>CC</option>
                    <option>CE</option>
                    <option>RC</option>
                    <option>PA</option>
                    <option>PPT</option>
                </select>
                <x-input-error for="tipodocumento" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-label for="roles_id" value="{{ __('Role') }}" />
                <select id="roles_id" name="roles_id" class="block mt-1 w-full">
                    <option value="2" {{ old('roles_id', 2) == 2 ? 'selected' : '' }}>Cliente</option>
                    
                    <option value="1" {{ old('roles_id', 2) == 1 ? 'selected' : '' }}>Administrador</option>
                    <option value="3" {{ old('roles_id', 2) == 3 ? 'selected' : '' }}>Empleado</option>
                   
                </select>
                <x-input-error for="roles_id" class="mt-2" />
            </div>
            @role('administrador')
            <!-- Sueldo -->
            <div class="mt-4">
                <x-label for="sueldo" value="{{ __('Sueldo') }}" />
                <x-input id="sueldo" class="block mt-1 w-full" type="hidden" name="sueldo" :value="old('sueldo', 0)" required autofocus autocomplete="sueldo" />
                <x-input-error for="sueldo" class="mt-2" />
            </div>
            <!-- Estado -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="estado" value="{{ __('Estado') }}" />
                <x-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado', 'Activo')" required autofocus autocomplete="estado" />
                <x-input-error for="estado" class="mt-2" />
            </div>
            <!-- Roles ID -->

            @endrole
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
