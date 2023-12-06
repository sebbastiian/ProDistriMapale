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
                    <a href="{{-- {{route('administrador.pedidos')}} --}}">
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
                <h2>Empleados</h2>
                <div class="search-bar">
                    <input class="inputsrch" type="text" id="searchInput" placeholder="Buscar empleados...">
                    <button class="search-botn" onclick="buscarEmpleados()">Buscar</button>
                </div>                               
            </div>
            <div class="navadmin filtro-tablas">
                <a href="#" id="mostrar-inicio" class="active">Inicio</a>
                <a href="#" id="mostrar-transportadores">Trasportadores</a>
                <a href="#" id="mostrar-administradores">Administradores</a>
            </div>
        </div>
        
        <div class="color tabla-transportadores">
            <div class="titabl tabla-transportadores">

                <h2>Transportadores</h2>
                
                <div class="caja-crear">
                    <a href="{{ route('transportador.create') }}">
                        <button class="boton" >
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
                
            </div>
            <table class="tablee tabla-transportadores">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo Doc.</th>
                        <th>Documento</th>
                        <th>Sueldo</th>
                        <th>Estado</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Teléfono</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->roles_id == 3)
                            <tr>
                                <td data-label="Nombre">{{ $user->name }}</td>
                                <td data-label="Apellido">{{ $user->apellido }}</td>
                                <td data-label="Tipo Doc.">{{ $user->tipodocumento }}</td>
                                <td data-label="Documento">{{ $user->documento }}</td>
                                <td data-label="Salario">{{ $user->sueldo }}</td>
                                <td data-label="Estado">{{ $user->estado }}</td>     
                                <td data-label="Correo">{{ $user->email }}</td>
                                <td data-label="Direccion">{{ $user->direccion }}</td>
                                <td data-label="Teléfono">{{ $user->telefono }}</td>
                                <td data-label="Editar" class="botonc">
                                    <a class="botoned" href="{{ route('administrador.transportadores.edit', $user->id) }}">
                                        Editar
                                    </a>
                                    
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="color tabla-administradores">
            <div class="titabl tabla-administradores">

                <h2>Administradores</h2>
                
                <div class="caja-crear">
                    <a href="{{ route('transportador.createa') }}">
                        <button class="boton" >
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
                
            </div>
            <table class="tablee tabla-administradores">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo Doc.</th>
                        <th>Documento</th>
                        <th>Sueldo</th>
                        <th>Estado</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Teléfono</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->roles_id == 1)
                            <tr>
                                <td data-label="Nombre">{{ $user->name }}</td>
                                <td data-label="Apellido">{{ $user->apellido }}</td>
                                <td data-label="Tipo Doc.">{{ $user->tipodocumento }}</td>
                                <td data-label="Documento">{{ $user->documento }}</td>
                                <td data-label="Salario">{{ $user->sueldo }}</td>
                                <td data-label="Estado">{{ $user->estado }}</td>     
                                <td data-label="Correo">{{ $user->email }}</td>
                                <td data-label="Direccion">{{ $user->direccion }}</td>
                                <td data-label="Teléfono">{{ $user->telefono }}</td>
                                <td data-label="Editar" class="botonc">
                                    <a class="botoned" href="{{ route('administrador.transportadores.edit', $user->id) }}">
                                        Editar
                                    </a>
                                    
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Oculta todas las tablas al cargar la página
            $(".tabla-transportadores, .tabla-administradores").hide();
    
            // Muestra todas las tablas al cargar la página
            $(".tabla-transportadores, .tabla-administradores").show();
    
            // Maneja el clic en los enlaces de la barra de navegación
            $("#mostrar-inicio").click(function() {
                $(".tabla-transportadores, .tabla-administradores").show();
    
                // Agrega la clase 'active' al enlace "Inicio"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
    
            $("#mostrar-administradores").click(function() {
                $(".tabla-administradores").show();
                $(".tabla-transportadores").hide();
    
                // Agrega la clase 'active' al enlace "Tipos"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
    
            $("#mostrar-transportadores").click(function() {
                $(".tabla-transportadores").show();
                $(".tabla-administradores").hide();
    
                // Agrega la clase 'active' al enlace "Productos"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // ...
    
            // Función para realizar la búsqueda
            function buscarEmpleados() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = $(".tabla-transportadores:visible, .tabla-administradores:visible");
                tr = $("tbody tr", table);
    
                // Recorre todas las filas de la tabla y oculta aquellas que no coincidan con la búsqueda
                for (i = 0; i < tr.length; i++) {
                    td = $("td", tr[i]);
                    for (var j = 0; j < td.length; j++) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break; // Si hay coincidencia en algún campo, muestra la fila y pasa a la siguiente
                        } else {
                            tr[i].style.display = "none"; // Si no hay coincidencia en ningún campo, oculta la fila
                        }
                    }
                }
            }
    
            // Asigna la función de búsqueda al evento de clic en el botón de búsqueda
            $(".search-botn").click(function() {
                buscarEmpleados();
            });
    
            // Asigna la función de búsqueda al evento de presionar Enter en el campo de búsqueda
            $("#searchInput").keypress(function(event) {
                if (event.which === 13) {
                    buscarEmpleados();
                }
            });
    
            // ...
        });
    </script>
    
</body>
</html>