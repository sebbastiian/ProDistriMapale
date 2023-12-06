<div id="filtered-products" class="row justify-content-center">
    @forelse($productos as $fila)
        <div class="col-md-4 col-xs-6">
            <div class="product">
                <div class="product-img">
                    @if ($fila->imagen)
                        <img src="img/{{$fila->imagen}}" alt="imagen">
                    @else
                        <p>Sin Imagen</p>
                    @endif
                    <div class="product-label"></div>
                </div>
                <div class="product-body">
                    <p class="product-category">{{$fila->idtipo}}</p>
                    <h3 class="product-name">
                        <a href="/blog/{{$fila->idproducto}}">{{$fila->descripcion}}</a>
                    </h3>
                    <h4 class="product-price">COP{{$fila->valor}}</h4>
                    <!-- Aquí puedes agregar más detalles del producto si es necesario -->
                    <div class="product-rating">
                        <!-- Puedes mostrar la calificación del producto si tienes esa información -->
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-btns">
                        <form action="{{route('add')}}" method="post">
                            @csrf
                            <input type="hidden" name="idproducto" value="{{$fila->idproducto}}">
                            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> AGREGAR</button>
                        </form>
                        <!-- Puedes agregar un botón de "Agregar a favoritos" si es necesario -->
                        <div class="post product-btns" id="{{$fila->idproducto}}">
                            @auth
                                <div class="product-btns" id="{{$fila->idproducto}}">
                                    <button class="add-to-wishlist">
                                        <span class="{{$fila->likes->contains("user_id",auth()->id()) ? 'text-danger':'text-dark' }}" id="heart{{$fila->idproducto}}">
                                            <i class="fa fa-heart-o"></i>
                                        </span>
                                    </button>
                                </div>
                            @else
                                <a href="/login" class="text-dark text-decoration-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                    </svg>
                                </a>
                            @endauth
                            <p class="d-inline" id="count{{$fila->idproducto}}"> Likes {{$fila->likes->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No hay productos disponibles.</p>
    @endforelse
</div>