<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistriMapale</title>
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
                <h1>Editar Productos</h1>
            </div>
        </div>
        <div class="color">
            <form action="{{ route('productos.update', $productos) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('GET')
                    <div>
                        <label for="marca">Marca</label>
                            <select class="form-control" name="idmarca" id="idmarca" aria-label="Default select example">
                                @forelse ($marcas as $marca)
                                <option value="{{ $marca->idmarca }}"  {{ $marca->idmarca == $productos->idmarca ? 'selected' : '' }}>{{ $marca->nombre }} </option>
                                @empty
                                @endforelse
                            </select>
                    </div>

                    <div>
                        <label for="tipos">Tipo</label>
                        <select class="form-control" name="idmarca" id="idmarca" aria-label="Default select example">
                            @forelse ($tipos as $tipo)
                            <option value="{{ $tipo->idtipo }}"  {{ $tipo->idtipo == $productos->idtipo ? 'selected' : '' }}>{{ $tipo->nombre }} </option>
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
            </form>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/sidebar.js"></script>
</body>
</html>