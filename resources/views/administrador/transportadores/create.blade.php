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
                <h1>Nuevo Transportador</h1>
            </div>   
        </div> 
        <div class="color">
            <div class="container">
                <div class="titulof">
                    <h2>Datos de registro</h2>
                </div>
                

                <form method="POST" {{-- id="miFormulario" --}} action="{{ route('transportador.store') }}" class="form-container">
                    @csrf
                     <!-- Nombre -->
                    <div>
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    </div>
            
                    <!-- Apellido -->
                    <div>
                        <label for="apellido">Apellido</label>
                        <input id="apellido" type="text" name="apellido" value="{{ old('apellido') }}" required autofocus autocomplete="apellido">
                    </div>
            
                    <!-- Tipo Documento -->
                    <div>
                        <label for="tipodocumento">Tipo de Documento</label>
                        <select id="tipodocumento" name="tipodocumento" value="{{ old('tipodocumento') }}" required autofocus autocomplete="tipodocumento">
                            <option>CC</option>
                            <option>CE</option>
                            <option>RC</option>
                            <option>PA</option>
                            <option>PPT</option>
                        </select>
                        <x-input-error for="tipodocumento" class="mt-2" />
                    </div>
            
                    <!-- Documento -->
                    <div>
                        <label for="documento">Documento</label>
                        <input id="documento" type="text" name="documento" value="{{ old('documento') }}" required autofocus autocomplete="documento">
                    </div>
            
                    <!-- Sueldo -->
                    <div>
                        <label for="sueldo">Sueldo</label>
                        <input id="sueldo" type="text" name="sueldo" value="{{ old('sueldo', 0) }}" oninput="formatSueldo(this)" required autofocus autocomplete="sueldo">
                    </div>
            
                    <!-- Email -->
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    </div>
            
                    <!-- Dirección -->
                    <div>
                        <label for="direccion">Dirección</label>
                        <input id="direccion" type="text" name="direccion" value="{{ old('direccion') }}" required autofocus autocomplete="direccion">
                    </div>
            
                    <!-- Teléfono -->
                    <div>
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" type="text" name="telefono" value="{{ old('telefono') }}" required autofocus autocomplete="telefono">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <!-- Roles ID -->
                    <div class="mt-4">
                        {{-- <x-label for="roles_id" value="{{ __('Role') }}" /> --}}
                        <input type="hidden" id="roles_id" name="roles_id" value="3">
                        <x-input-error for="roles_id" class="mt-2" />
                    </div>

                    <!-- Estado -->
                    <div>
                        {{-- <label for="estado">Estado</label> --}}
                        <input type="hidden" id="estado" name="estado" value="Activo" required autofocus autocomplete="estado">
                        <x-input-error for="estado" class="mt-2" />
                    </div>

                    <div id="crear">
                        <button type="submit">Crear</button>
                    </div>
                </form>
            </div>
            
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
{{--     <script>
        function formatSueldo(input) {
            // Elimina cualquier carácter que no sea un dígito
            let cleanedValue = input.value.replace(/\D/g, '');

            // Formatea el valor con comas para mejor legibilidad
            let formattedValue = Number(cleanedValue).toLocaleString();

            // Establece el valor formateado de nuevo en el campo
            input.value = formattedValue;
        }

        // Antes de enviar el formulario, elimina el formato para que sea un número entero
        document.getElementById('miFormulario').addEventListener('submit', function(event) {
            let sueldoInput = document.getElementById('sueldo');
            let cleanedValue = sueldoInput.value.replace(/\D/g, '');
            sueldoInput.value = cleanedValue;
        });
    </script> --}}
</body>
</html>