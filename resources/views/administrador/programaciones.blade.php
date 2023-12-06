<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
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
                    <a id="inbox"  href="{{route('administrador.programaciones')}}">
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
                    <a href="{{-- {{route('administrador.pedidos')}} --}}">
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
                <h2>Cronograma</h2>
                <div class="search-bar">
                    <input class="inputsrch" type="text" id="searchInput" placeholder="Buscar en el cronograma...">
                    <button class="search-botn " onclick="buscarProgramaciones()">Buscar</button>
                </div>                               
            </div>
        </div>

        <div class="color">
            <div class="titabl tabla-productos">

                <h2>Programaciones</h2>
                
                <div class="caja-crear">
                    <a href="{{route('programaciones.create')}}">
                        <button class="boton" >
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Asignar</span>
                        </button>
                    </a>
                </div>
                
            </div>
            <table class="tablee">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Vehiculo</th>
                        <th>Transportador</th>
                        <th>Observaciones</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programaciones as $programacion)
                            <tr>
                                <td data-label="Fecha">{{ $programacion->fecha }}</td>
                                <td data-label="Vehiculo">{{ $programacion->nombre }}</td>
                                <td data-label="Transportador">{{ $programacion->nombrecompleto }}</td>
                                <td data-label="Observaciones">{{ $programacion->observaciones }}</td>
                                <td data-label="Editar" class="botoncc">
                                    <a class="botoned" href="{{route('administrador.cronograma.edit',$programacion->idprogramacion)}}">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
    <script>
        function buscarProgramaciones() {
            // Get input value and convert it to lowercase for case-insensitive search
            var input = document.getElementById('searchInput').value.toLowerCase();
    
            // Get all table rows
            var rows = document.querySelectorAll('.tablee tbody tr');
    
            // Loop through each row and check if it contains the search input
            rows.forEach(function(row) {
                var cells = row.getElementsByTagName('td');
                var found = false;
    
                // Loop through each cell in the row
                for (var i = 0; i < cells.length; i++) {
                    var cellText = cells[i].innerText.toLowerCase();
    
                    // Check if the cell text contains the search input
                    if (cellText.includes(input)) {
                        found = true;
                        break;
                    }
                }
    
                // Show or hide the row based on whether it matches the search input
                row.style.display = found ? '' : 'none';
            });
        }
    </script>
        
</body>
</html>