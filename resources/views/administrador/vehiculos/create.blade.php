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
                    <a href="{{route('administrador.transportadores')}}">
                        <ion-icon name="man-outline"></ion-icon>
                        <span>Empleados </span>
                    </a>
                </li>
                <li>
                    <a id="inbox" href="{{route('administrador.vehiculos')}}">
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
                <h1>Nuevo Vehículo</h1>
            </div>
        </div>
        <div class="color">
            <div class="container">
                <div class="titulof">
                    <h2>Datos de registro</h2>
                </div>
                
                <form action="{{route('vehiculos.store')}}" method="POST" enctype="multipart/form-data" class="formulario-vehiculo">
                    @csrf
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" id="placa" class="form-control" oninput="formatPlaca(this)" onkeyup="formatPlaca(this)" placeholder="XXX ###">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="Activo">Activo</option>
                            <option value="Reparación">Reparación</option>
                        </select>
                    </div>
                    <div class="form-group" id="crear">
                        <button type="submit" class="btn-crear-vehiculo">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
    <script>
        function formatPlaca(input) {
            let placaValue = input.value;

            // Elimina caracteres no deseados (deja solo letras y números)
            placaValue = placaValue.replace(/[^a-zA-Z0-9]/g, '');

            // Limita la longitud a 6 caracteres
            placaValue = placaValue.substring(0, 6);

            // Inserta un espacio después de las primeras 3 letras
            if (placaValue.length > 3) {
                placaValue = placaValue.substring(0, 3) + ' ' + placaValue.substring(3);
            }

            // Convierte a mayúsculas
            placaValue = placaValue.toUpperCase();

            // Aplica la validación específica (3 letras, espacio o guion, 3 números)
            if (/^[A-Z]{3}[-\s][0-9]{3}$/.test(placaValue)) {
                input.setCustomValidity('');  // La entrada es válida
            } else {
                input.setCustomValidity('Formato de placa incorrecto');  // La entrada es inválida
            }

            // Establece el valor formateado de nuevo en el campo
            input.value = placaValue;
        }
    </script>

</body>
</html>