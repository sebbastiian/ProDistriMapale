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
            <h1>Nuevo Producto</h1>
        </div>
        <div class="cajaform">
            <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="fieldset">
                    <legend>Nuevo Producto</legend>

                    <div>
                        <label for="idmarca">Marca</label>
                        <select name="idmarca" id="idmarca" class="form-control">
                            @foreach($marcas as $marca)
                            <option value="{{$marca->idmarca}}">{{$marca->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="idtipo">Tipo</label>
                        <select name="idtipo" id="idtipo" class="form-control">
                            @foreach($tipos as $tipo)
                            <option value="{{$tipo->idtipo}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="descripcion">Descripcion del producto</label>
                        <input type="text" name="descripcion" id="descripcion" >
                    </div>
            
                    <div>
                        <label for="cantidad">Cantidad del producto</label>
                        <input type="number" name="cantidad" id="cantidad" >
                    </div>
            
                    <div>
                        <label for="contneto">Contenido Neto</label>
                        <input type="text" name="contneto" id="contneto" >
                    </div>
            
                    <div>
                        <label for="unidadxempaque">Unidad x Empaque</label>
                        <input type="number" name="unidadxempaque" id="unidadxempaque" >
                    </div>
            
                    <div>
                        <select name="disponibilidad" class="form-control">
                            <option value="Disponible">Disponible</option>
                            <option value="NoDisponible">No Disponible</option>
                        </select>
                    </div>
            
                    <div>
                        <label for="valor">Valor del producto</label>
                        <input type="text" name="valor" id="valor" >
                    </div>
                
                    <div>
                        <label for="imagen">Imagen del producto</label>
                        <input type="file" name="imagen" id="imagen">
                    </div>
                    <a href="" onclick="return alert('¡Producto Agregado!')"><button type="submit">Crear Producto</button></a>
            </fieldset>
            </form>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
</body>
</html>