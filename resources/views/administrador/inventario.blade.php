<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/styleTablas.css">
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
            <button class="boton">
                <ion-icon name="add-outline"></ion-icon>
                <span>Crear nuevo</span>
            </button>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a  href="{{route('administrador.index')}}">
                        <ion-icon name="clipboard-outline"></ion-icon>
                        <span>Tablas</span>
                    </a>
                </li>
                <li>
                    <a id="inbox" href="#">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span>Inventario</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.clientes')}}">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Clientes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.transportadores')}}">
                        <ion-icon name="man-outline"></ion-icon>
                        <span>Empleados</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('administrador.vehiculos')}}">
                        <ion-icon name="car-sport-outline"></ion-icon>
                        <span>Vehículos</span>
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
                    <a href="#">
                        <ion-icon name="calculator-outline"></ion-icon>
                        <span>Contabilidad</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <x-dropdown-link href="{{ route('profile.show') }}">
                    <img src="/img/perfil-de-usuario.avif" alt="">
                </x-dropdown-link>
                
                <div class="info-usuario">
                    <div class="nombre-email">
                        <h1 class="nombre"> {{ Auth::user()->name }} {{ Auth::user()->apellido }}</h1>
                        
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Salir') }}
                                <ion-icon name="log-in-outline"></ion-icon>
                            </x-dropdown-link>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>


    <main>

        <div class="tittlee">
            <h1>Inventario</h1>
        </div>
        <div class="containert">
            <div class="titabl">

                <h2>Marcas</h2>
                
                <div class="caja-crear">
                    <a href="{{route('marcas.create')}}">
                        <button class="boton" >
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
                
            </div>
            

            <table class="tablee">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                            <tr>
                                <td data-label="Id">{{ $marca->idmarca }}</td>
                                <td data-label="Nombre">{{ $marca->nombre }}</td>
                                <td data-label="Editar" class="botonc">
                                    <a class="botoned" href="{{route('administrador.marcas.edit',$marca->idmarca)}}">
                                        Editar
                                    </a>
                                </td>

                                <td data-label="Eliminar" class="botonc">
                                    <a class="botonel" href="{{route('marcas.destroy',$marca->idmarca)}}" onclick="return confirm('Esta seguro de eliminar la sanción')">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="titabl">

                <h2>Tipos</h2>
                
                <div class="caja-crear">
                    <a href="{{route('tipos.create')}}">
                        <button class="boton" >
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Crear nuevo</span>
                        </button>
                    </a>
                </div>
                
            </div>

            <table class="tablee">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                            <tr>
                                <td data-label="Id">{{ $tipo->idtipo }}</td>
                                <td data-label="Nombre">{{ $tipo->nombre }}</td>
                                <td data-label="Editar" class="botonc">
                                    <a class="botoned" href="{{route('administrador.tipos.edit',$tipo->idtipo)}}">
                                        Editar
                                    </a>
                                </td>
                                
                                <td data-label="Eliminar" class="botonc">
                                    <a class="botonel" href="{{route('tipos.destroy',$tipo->idtipo)}}" onclick="return confirm('Esta seguro de eliminar la sanción')">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="containert">
            <div class="titabl">

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
            <table class="tablee">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Detalle</th>
                        <th>Cant.</th>
                        <th>Cont.Neto</th>
                        <th>unXemp</th>
                        <th>Estado</th>
                        <th>Valor</th>
                        <th>Img</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                            <tr>
                                <td data-label="Id">{{ $producto->idproducto }}</td>
                                <td data-label="Marca">{{ $producto->namemarca }}</td>
                                <td data-label="Tipo">{{ $producto->nametipo }}</td>
                                <td data-label="Descripcion">{{ $producto->descripcion }}</td>
                                <td data-label="Cantidad">{{ $producto->cantidad }}</td>
                                <td data-label="ContNeto">{{ $producto->contneto }}</td>
                                <td data-label="UnidadxEmpaque">{{ $producto->unidadxempaque }}</td>
                                <td data-label="Estado">{{ $producto->disponibilidad }}</td>
                                <td data-label="Valor">{{ $producto->valor }}</td>
                                <td data-label="IMG">{{ $producto->imagen }}</td>
                                <td data-label="Editar" class="botonc">
                                    <a class="botoned" href="{{route('administrador.productos.edit',$producto->idproducto)}}">
                                        Editar
                                    </a>
                                </td>

                                <td data-label="Eliminar" class="botonc">
                                    <a class="botonel" href="{{route('productos.destroy',$producto->idproducto)}}" onclick="return confirm('¿Esta seguro de eliminar el producto?')">
                                        Eliminar
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
</body>
</html>