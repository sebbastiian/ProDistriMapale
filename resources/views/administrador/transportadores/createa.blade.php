<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
    <link rel="stylesheet" href="/css/formCrear.css">
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <div class="usuario">
                    <img id="cloud" src="\img\logomd.png" alt="">
                    <span style="margin-top: 3%;" >DistriMapale</span>
                </div>
            </div>
            <a class="creanuv" href="{{route('administrador.index')}}">
                <button class="boton">
                    <ion-icon name="add-outline"></ion-icon>
                    <span>Crear nuevo</span>
                </button>
            </a>

        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="{{route('administrador.inventario')}}">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span>Inventario</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.programaciones')}}">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <span>Cronograma</span>
                    </a>
                </li>
                <li>
                    <a href="{{-- {{route('administrador.facturas')}} --}}">
                        <ion-icon name="cash-outline"></ion-icon>
                        <span>Ventas</span>
                    </a>
                </li>
                <li>
                    <a href="{{-- {{route('administrador.contabilidad')}} --}}">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <span>Contabilidad</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.proveedores')}}">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.pedidos')}}">
                        <ion-icon name="bag-add-outline"></ion-icon>
                        <span>Pedidos</span>
                    </a>
                </li>
                <li>
                    <a id="inbox" href="{{route('administrador.transportadores')}}">
                        <ion-icon name="man-outline"></ion-icon>
                        <span>Empleados </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.vehiculos')}}">
                        <ion-icon name="car-sport-outline"></ion-icon>
                        <span>Vehículos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.clientes')}}">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Clientes</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                
                <div class="switch">
                  
                </div>
            </div>

    
            <div class="usuario">
                <x-dropdown-link href="{{ route('profile.show') }}">
                    <img src="/img/perfil-de-usuario.avif" alt="">
                </x-dropdown-link>
                
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"> {{ Auth::user()->name }} {{ Auth::user()->apellido }}</span>
                        
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button class="ver-mas" href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Salir') }}
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <main>
        <div class="navegacion-admin">
            <div class="tittlee">
                <h1>Nuevo Administrador</h1>
            </div>    
        </div>
        <div class="color">
            <div class="container">
                <div class="titulof">
                    <h2>Datos de registro</h2>
                </div>
                    <form method="POST" action="{{ route('transportador.storea') }}" enctype="multipart/form-data" class="form-container">
                        @csrf
                        <!-- Todos los campos del usuario aquí -->
                        <!-- Name -->
                        <div class="mt-4">
                            <label for="name" class="block font-bold mb-2">Nombre</label>
                            <input id="name" class="block w-full p-2 border border-gray-300 rounded-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                
                        <!-- Apellido -->
                        <div class="mt-4">
                            <label for="apellido" class="block font-bold mb-2">Apellido</label>
                            <input id="apellido" class="block w-full p-2 border border-gray-300 rounded-md" type="text" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
                        </div>
                
                        <!-- Tipo Documento -->
                        <div class="mt-4">
                            <label for="tipodocumento" class="block font-bold mb-2">Tipo de Documento</label>
                            <select id="tipodocumento" name="tipodocumento" class="block w-full p-2 border border-gray-300 rounded-md" value="{{ old('tipodocumento') }}" required autofocus autocomplete="tipodocumento">
                                <option>CC</option>
                                <option>CE</option>
                                <option>RC</option>
                                <option>PA</option>
                                <option>PPT</option>
                            </select>
                            <x-input-error for="tipodocumento" class="text-red-500" />
                        </div>
                
                        <!-- Documento -->
                        <div class="mt-4">
                            <label for="documento" class="block font-bold mb-2">Documento</label>
                            <input id="documento" class="block w-full p-2 border border-gray-300 rounded-md" type="text" name="documento" :value="old('documento')" required autofocus autocomplete="documento" />
                        </div>
                
                        <!-- Sueldo -->
                        <div class="mt-4">
                            <label for="sueldo" class="block font-bold mb-2">Sueldo</label>
                            <input id="sueldo" class="block w-full p-2 border border-gray-300 rounded-md" type="number" name="sueldo" :value="old('sueldo', 0)" required autofocus autocomplete="sueldo" />
                            <x-input-error for="sueldo" class="text-red-500" />
                        </div>
                
                        <!-- Email -->
                        <div class="mt-4">
                            <label for="email" class="block font-bold mb-2">Email</label>
                            <input id="email" class="block w-full p-2 border border-gray-300 rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>
                
                        <!-- Direccion -->
                        <div class="mt-4">
                            <label for="direccion" class="block font-bold mb-2">Dirección</label>
                            <input id="direccion" class="block w-full p-2 border border-gray-300 rounded-md" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
                        </div>
                
                        <!-- Telefono -->
                        <div class="mt-4">
                            <label for="telefono" class="block font-bold mb-2">Teléfono</label>
                            <input id="telefono" class="block w-full p-2 border border-gray-300 rounded-md" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                        </div>
                
                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" class="block font-bold mb-2">Password</label>
                            <input id="password" class="block w-full p-2 border border-gray-300 rounded-md" type="password" name="password" required autocomplete="new-password" />
                        </div>
                
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-bold mb-2">Confirm Password</label>
                            <input id="password_confirmation" class="block w-full p-2 border border-gray-300 rounded-md" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <!-- Roles ID -->
                        <div class="mt-4">
                            <input type="hidden" id="roles_id" name="roles_id" value="1">
                            <x-input-error for="roles_id" class="text-red-500" />
                        </div>
                        <!-- Estado -->
                        <div class="mt-4">
                            <input type="hidden" id="estado" name="estado" value="Activo">
                            <x-input-error for="estado" class="text-red-500" />
                        </div>
                                        
                
                        <div id="crear" class="mt-4">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Crear</button>
                        </div>
                    </form>
            </div>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
</body>
</html>