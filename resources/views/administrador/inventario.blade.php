<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
    <link rel="stylesheet" href="\css\navegacionadmin.css">
    <link rel="stylesheet" href="/css/tarjetas.css">

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
                    <a id="inbox" href="{{route('administrador.inventario')}}">
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
                <h2>Inventario</h2>
                <div class="search-bar">
                    <input class="inputsrch" type="text" id="searchInput" placeholder="Buscar productos...">
                    <button class="search-botn " onclick="buscarProductos()">Buscar</button>
                </div>                               
            </div>
            <div class="navadmin filtro-tablas">
                <a href="#" id="mostrar-inicio" class="active">Inicio</a>
                <a href="#" id="mostrar-marcas">Marcas</a>
                <a href="#" id="mostrar-tipos">Tipos</a>
                <a href="#" id="mostrar-productos">Productos</a>
            </div>
        </div>

        <div class="color tabla-productos">
            <div class="titabl tabla-productos">

                <h2>Productos</h2>
                
                <div class="caja-crear">
                    <a href="{{route('productos.create')}}">
                        <button class="boton" >
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
                
            </div>
            <table class="tablee tabla-productos">
                <thead>
                    <tr>
                        <th>Mas</th>
                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Detalle</th>
                        <th>Cant.</th>
                        <th>Estado</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                            <tr>
                                <td class="Detalles" data-label="Detalles">
                                    <div>
                                        <button class="ver-mas botonmo" onclick="mostrarDetalles(
                                            '{{$producto->namemarca}}',
                                            '{{$producto->nametipo}}',
                                            '{{$producto->descripcion}}',
                                            '{{$producto->cantidad}}',
                                            '{{$producto->disponibilidad}}',
                                            '{{$producto->valor}}',
                                            '{{$producto->imagen}}',
                                            '{{$producto->contneto}}',
                                            '{{$producto->unidadxempaque}}'
                                        )"><ion-icon class="" name="add-circle-outline"></ion-icon></button>
                                    </div>
                                </td>  
                                <td data-label="Descripcion">{{ $producto->namemarca }}</td>
                                <td data-label="Cantidad">{{ $producto->nametipo }}</td>
                                <td data-label="Descripcion">{{ $producto->descripcion }}</td>
                                <td data-label="Cantidad">{{ $producto->cantidad }}</td>
                                <td data-label="Estado">{{ $producto->disponibilidad }}</td>
                                <td data-label="Valor">{{ $producto->valor }}</td>
                                <td data-label="Editar" class="botoncc">
                                    <a class="botoned" href="{{route('administrador.productos.edit',$producto->idproducto)}}">
                                        Editar
                                    </a>
                                </td>
                                <td data-label="Eliminar" class="botoncc">
                                    <a class="botonel" href="{{route('productos.destroy',$producto->idproducto)}}" onclick="return confirm('¿Esta seguro de eliminar el producto?')">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                            <div id="modalContainer" class="modal-container">
                                <div class="modal-content">
                                    <span class="close-modal" onclick="cerrarModal()">&times;</span>
                                    <h2>Detalles del Producto</h2>
                                    <p><strong>Marca:</strong> <span id="modalMarca"></span></p>
                                    <p><strong>Tipo:</strong> <span id="modalTipo"></span></p>
                                    <p><strong>Descripción:</strong> <span id="modalDescripcion"></span></p>
                                    <p><strong>Cont. Neto:</strong> <span id="modalContNeto"></span></p>
                                    <p><strong>Ubidad x Empaque:</strong> <span id="modalUxE"></span></p>
                                    <p><strong>Cantidad:</strong> <span id="modalCantidad"></span></p>
                                    <p><strong>Estado:</strong> <span id="modalEstado"></span></p>
                                    <p><strong>Valor:</strong> <span id="modalValor"></span></p>
                                    <p><strong>Imagen:</strong> <span id="modalImagen"></span></p>
                                </div>
                            </div>      
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-container">
                {{ $productos->links() }}
            </div>
        </div>


        <div class="color tabla-marcas">
            <div class="titabl tabla-marcas">
                <h2>Marcas</h2>
                <div class="caja-crear">
                    <a href="{{route('marcas.create')}}">
                        <button class="boton">
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="tabla-marcas">
        
                <div class="card-container">
                    @foreach ($marcas as $marca)
                        <div class="card">
                            <div class="card-body">
                                <h3>{{ $marca->nombre }}</h3>
                                <div class="botonc">
                                    <a class="botoned" href="{{route('administrador.marcas.edit',$marca->idmarca)}}">
                                        Editar
                                    </a>
                                    <a class="botonel" href="{{route('marcas.destroy',$marca->idmarca)}}" onclick="return confirm('Esta seguro de eliminar la marca')">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            

        <div class="color tabla-tipos">
            <div class="titabl tabla-tipos">
                <h2>Tipos</h2>
        
                <div class="caja-crear">
                    <a href="{{route('tipos.create')}}">
                        <button class="boton">
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="tabla-tipos">
                <div class="card-container">
                    @foreach ($tipos as $tipo)
                        <div class="card">
                            <div class="card-body">
                                <h3>{{ $tipo->nombre }}</h3>
                                <div class="botonc">
                                    <a class="botoned" href="{{ route('administrador.tipos.edit', $tipo->idtipo) }}">
                                        Editar
                                    </a>
                                    <a class="botonel" href="{{ route('tipos.destroy', $tipo->idtipo) }}" onclick="return confirm('Esta seguro de eliminar el tipo')">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-U7I2H4Hq38DFSTruMD5IeFYI6I5SiS9O3M5MT5zPjFEL1W5lEwRg10JLx2wnjOrM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIMB/RG2gCW" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Oculta todas las tablas al cargar la página
            $(".tabla-marcas, .tabla-tipos, .tabla-productos").hide();
    
            // Muestra todas las tablas al cargar la página
            $(".tabla-marcas, .tabla-tipos, .tabla-productos").show();
    
            // Maneja el clic en los enlaces de la barra de navegación
            $("#mostrar-inicio").click(function() {
                $(".tabla-marcas, .tabla-tipos, .tabla-productos").show();
    
                // Agrega la clase 'active' al enlace "Inicio"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
    
            $("#mostrar-marcas").click(function() {
                $(".tabla-marcas").show();
                $(".tabla-tipos, .tabla-productos").hide();
    
                // Agrega la clase 'active' al enlace "Marcas"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
    
            $("#mostrar-tipos").click(function() {
                $(".tabla-tipos").show();
                $(".tabla-marcas, .tabla-productos").hide();
    
                // Agrega la clase 'active' al enlace "Tipos"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
    
            $("#mostrar-productos").click(function() {
                $(".tabla-productos").show();
                $(".tabla-marcas, .tabla-tipos").hide();
    
                // Agrega la clase 'active' al enlace "Productos"
                $(".filtro-tablas a").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    
    <script>
        function mostrarDetalles(marca, tipo, descripcion, cantidad,  estado, valor, imagen, contneto, unidadxempaque) {
            var modalContainer = document.getElementById('modalContainer');
            modalContainer.style.display = 'flex';
    
            // Rellena la ventana modal con los datos
            document.getElementById('modalMarca').innerText = marca;
            document.getElementById('modalTipo').innerText = tipo;
            document.getElementById('modalDescripcion').innerText = descripcion;
            document.getElementById('modalCantidad').innerText = cantidad;
            document.getElementById('modalEstado').innerText = estado;
            document.getElementById('modalValor').innerText = valor;
            document.getElementById('modalContNeto').innerText = contneto;
            document.getElementById('modalUxE').innerText = unidadxempaque;
            document.getElementById('modalImagen').innerText = imagen;
        }
    
        function cerrarModal() {
            var modalContainer = document.getElementById('modalContainer');
            modalContainer.style.display = 'none';
        }
    </script>

    <script>
        function buscarProductos() {
            // Obtener el valor del campo de búsqueda
            var inputText = $('#searchInput').val().toLowerCase();

            // Filtrar productos según el texto de búsqueda
            $('.tabla-productos tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(inputText) > -1);
            });
        }
    </script>



</body>
</html>