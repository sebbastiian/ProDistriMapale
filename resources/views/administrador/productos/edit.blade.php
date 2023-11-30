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
                    <span>Drak Mode</span>
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
            <h1>Editar Productos</h1>
        </div>
        <div class="cajaform">
            <form action="{{ route('productos.update', $productos) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <fieldset class="fieldset">
                <legend>Editar Datos del Producto</legend>
                    <div>
                        <label for="marca">Marca</label>
                        <select name="idmarca" class="form-control">
                            <@forelse ($marcas as $marca)
                            @if($productos->idmarca==$marca->idmarca)
                            <option value="{{$marca->idmarca}}"selected>{{ $marca->nombre}}</option>
                            @else
                            <option value="{{$marca->idmarca}}"selected>{{ $marca->nombre}}</option>
                            @endif
                            @empty 
                        @endforelse
                        </select>
                    </div>

                    <div>
                        <label for="tipos">Tipo</label>
                        <select name="idtipo" class="form-control">
                            <@forelse ($tipos as $tipo)
                            @if($productos->idtipo==$tipo->idtipo)
                            <option value="{{$tipo->idtipo}}"selected>{{ $tipo->nombre}}</option>
                            @else
                            <option value="{{$tipo->idtipo}}"selected>{{ $tipo->nombre}}</option>
                            @endif
                            @empty 
                        @endforelse
                        </select>
                    </div>

                    <div>
                        <label>Detalle:</label>
                        <input type="text" name="descripcion" id="descripcion" value="{{$productos->descripcion}}">
                    </div>

                    <div>
                        <label>Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad" value="{{$productos->cantidad}}">
                    </div>

                    <div>
                        <label>Contenido Neto:</label>
                        <input type="text" name="contneto" id="contneto" value="{{$productos->contneto}}">
                    </div>

                    <div>
                        <label>Unidad por Empaque:</label>
                        <input type="text" name="unidadxempaque" id="unidadxempaque" value="{{$productos->unidadxempaque}}">
                    </div>

                    <div>
                        <label>Estado:</label>
                        <input type="text" name="disponibilidad" id="disponibilidad" value="{{$productos->disponibilidad}}">
                    </div>

                    <div>
                        <label>Valor:</label>
                        <input type="text" name="valor" id="valor" value="{{$productos->valor}}">
                    </div>
                    {{-- <div>
                        <label for="imagen">Imagen del producto</label>
                        <input type="file" name="imagen" id="imagen">
                    </div> --}}
                    <button type="submit">Actualizar</button>
                </fieldset>
            </form>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
</body>
</html>