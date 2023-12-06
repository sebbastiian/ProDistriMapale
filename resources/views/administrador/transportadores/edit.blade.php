<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapele</title>
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
                    <a href="{{--   --}}">
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
                <h1>Editar Empleado</h1>
            </div>
        </div>

        <div class="color">
            <div class="container mx-auto mt-8">
                <form action="{{ route('transportadores.update', $users->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
                    @csrf
                    @method('PUT')            
                    <!-- Todos los campos del usuario aquí -->
                    <!-- Name -->
                    <div class="mt-4">
                        <label for="name" class="block font-bold mb-2">Nombre</label>
                        <input id="name" name="name" value="{{ $users->name }}" class="block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
            
                    <!-- Email -->
                    <div class="mt-4">
                        <label for="email" class="block font-bold mb-2">Correo</label>
                        <input id="email" name="email" value="{{ $users->email }}" class="block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
            
                    <!-- Apellido -->
                    <div class="mt-4">
                        <label for="apellido" class="block font-bold mb-2">Apellido</label>
                        <input id="apellido" name="apellido" value="{{ $users->apellido }}" class="block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
            
                    <!-- Tipo Documento -->
                    <div class="mt-4">
                        <label for="tipodocumento" class="block font-bold mb-2">Tipo Documento</label>
                        <input id="tipodocumento" name="tipodocumento" value="{{ $users->tipodocumento }}" class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
            
                    <!-- Documento -->
                    <div class="mt-4">
                        <label for="documento" class="block font-bold mb-2">Documento</label>
                        <input id="documento" name="documento" value="{{ $users->documento }}" class="block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
            
                    <!-- Sueldo -->
                    <div class="mt-4">
                        <label for="sueldo" class="block font-bold mb-2">Sueldo</label>
                        <input id="sueldo" name="sueldo" value="{{ $users->sueldo }}" class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
            
                    <!-- Estado -->
                    <div class="mt-4">
                        <label for="estado" class="block font-bold mb-2">Estado</label>
                        <input id="estado" name="estado" value="{{ $users->estado }}" class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
            
                    <!-- Dirección -->
                    <div class="mt-4">
                        <label for="direccion" class="block font-bold mb-2">Dirección</label>
                        <input id="direccion" name="direccion" value="{{ $users->direccion }}" class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
            
                    <!-- Teléfono -->
                    <div class="mt-4">
                        <label for="telefono" class="block font-bold mb-2">Teléfono</label>
                        <input id="telefono" name="telefono" value="{{ $users->telefono }}" class="block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mt-4">
                        <input type="hidden" name="" value="" class="block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <!-- Botón Guardar Cambios -->
                    <div id="crear" class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Actualizar</button>
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