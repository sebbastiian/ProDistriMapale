<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(attributes: ['middleware' => 'auth'], routes: function(){  
    /*FAVORITOS*/
//Route:: get('dashboard',[App\Http\Controllers\PostController::class, 'index'])->name('dashboard');

Route::post('/like', [App\Http\Controllers\PostController::class,'like'])->name('like');

/*CARRITO*/
Route:: get('dashboard',[App\Http\Controllers\FrontController::class, 'index'])->name('dashboard');
Route:: post('cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
Route:: get('cart/chekout', [App\Http\Controllers\CartController::class, 'chekout'])->name('chekout');
Route:: get('cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route:: get('/removeitem/{id}', [App\Http\Controllers\CartController::class, 'removeItem'])->name('removeItem');
Route:: get('/increaseQuantity/{id}', [App\Http\Controllers\CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route:: get('/decreaseQuantity/{id}', [App\Http\Controllers\CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route:: get('/confirmarCarrito', [App\Http\Controllers\CartController::class, 'confirmarCarrito'])->name('confirmarcarrito');

/*USUARIOS*/
Route::get('administrador/index',[App\Http\Controllers\AdminController::class, 'index'])->name('administrador.index'); /* VISTA TABLAS */
Route::get('administrador/clientes',[App\Http\Controllers\UserController::class, 'index2'])->name('administrador.clientes'); /* TABLA CLIENTES */
Route::get('administrador/transportadores',[App\Http\Controllers\UserController::class, 'index3'])->name('administrador.transportadores'); /* TABLA TRASPORTADORES */


/* VEHICULOS */
Route::get('administrador/vehiculos',[App\Http\Controllers\VehiculosController::class, 'index'])->name('administrador.vehiculos'); /* TABLA DE VEHICULOS */
Route::get('administrador/vehiculos/crear', [App\Http\Controllers\VehiculosController::class, 'create'])->name('vehiculos.create');
Route::post('administrador/vehiculos/agregar', [App\Http\Controllers\VehiculosController::class, 'store'])->name('vehiculos.store');
Route::get('administrador/vehiculos/edit/{id}', [App\Http\Controllers\VehiculosController::class, 'edit'])->name('administrador.vehiculos.edit');
Route::put('administrador/vehiculos/{vehiculos}/actualizar', [App\Http\Controllers\VehiculosController::class, 'update'])->name('vehiculos.update');

/* TRASPORTADORES */
Route::get('administrador/transportador/crear', [App\Http\Controllers\UserController::class, 'create'])->name('transportador.create');
Route::post('administrador/transportador/agregar', [App\Http\Controllers\UserController::class, 'store'])->name('transportador.store');
Route::get('administrador/transportador/crearadmin', [App\Http\Controllers\UserController::class, 'create2'])->name('transportador.createa');
Route::post('administrador/transportador/agregaradmin', [App\Http\Controllers\UserController::class, 'store2'])->name('transportador.storea');
Route::get('/administrador/transportadores/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('administrador.transportadores.edit');
Route::put('administrador/transportadores/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('transportadores.update');

/* PROGRAMACIONES */
Route::get('administrador/programaciones',[App\Http\Controllers\ProgamacionesController::class, 'index'])->name('administrador.programaciones'); /* TABLA DE PROGRAMACIONES */
Route::get('administrador/cronograma/create', [App\Http\Controllers\ProgamacionesController::class, 'create'])->name('programaciones.create');
Route::post('administrador/cronograma/agregar', [App\Http\Controllers\ProgamacionesController::class, 'store'])->name('programaciones.store');
Route::get('administrador/cronograma/edit/{id}', [App\Http\Controllers\ProgamacionesController::class, 'edit'])->name('administrador.cronograma.edit');
Route::put('administrador/cronograma/{id}/actualizar', [App\Http\Controllers\ProgamacionesController::class, 'update'])->name('programaciones.update');

/* PROVEEDORES */
Route::get('administrador/proveedores',[App\Http\Controllers\ProveedoresController::class, 'index'])->name('administrador.proveedores'); /* TABLA DE PROGRAMACIONES */
Route::get('administrador/proveedor/create', [App\Http\Controllers\ProveedoresController::class, 'create'])->name('proveedores.create');
Route::post('administrador/proveedor/agregar', [App\Http\Controllers\ProveedoresController::class, 'store'])->name('proveedores.store');
Route::get('administrador/proveedor/edit/{id}', [App\Http\Controllers\ProveedoresController::class, 'edit'])->name('administrador.proveedor.edit');
Route::put('administrador/proveedor/{id}/actualizar', [App\Http\Controllers\ProveedoresController::class, 'update'])->name('proveedores.update');
/*TIPO*/
Route::get('administrador/tipos/crear', [App\Http\Controllers\TiposController::class, 'create'])->name('tipos.create');
Route::post('administrador/tipos/agregar', [App\Http\Controllers\TiposController::class, 'store'])->name('tipos.store');
Route::get('administrador/tipos/eliminar/{id}',  [App\Http\Controllers\TiposController::class, 'destroy'])->name('tipos.destroy');
Route::get('administrador/inventario',[App\Http\Controllers\TiposController::class, 'index'])->name('administrador.inventario');
Route::get('administrador/tipos/edit/{id}', [App\Http\Controllers\EditarTiposController::class, 'edit'])->name('administrador.tipos.edit');
Route::put('administrador/tipos/{id}/actualizar', [App\Http\Controllers\EditarTiposController::class, 'update'])->name('tipos.update');

/*MARCA*/
Route::get('administrador/marcas/crear', [App\Http\Controllers\MarcasController::class, 'create'])->name('marcas.create');
Route::post('administrador/marcas/agregar', [App\Http\Controllers\MarcasController::class, 'store'])->name('marcas.store');
Route::get('administrador/marcas/edit/{id}', [App\Http\Controllers\MarcasController::class, 'edit'])->name('administrador.marcas.edit');
Route::get('productos/{marcas}/actualizar',[App\Http\Controllers\MarcasController::class, 'update'])->name('marcas.update');
Route::get('administrador/marcas/eliminar/{id}',  [App\Http\Controllers\MarcasController::class, 'destroy'])->name('marcas.destroy');
Route::get('administrador/inventario',[App\Http\Controllers\MarcasController::class, 'index'])->name('administrador.inventario');

/*PRODUCTOS*/
Route::get('administrador/productos/crear', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::post('administrador/productos/agregar', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('administrador/productos/edit/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('administrador.productos.edit');
Route::get('administrador/productos/actualizar/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');
Route::get('administrador/productos/eliminar/{id}',  [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');
Route::get('administrador/inventario',[App\Http\Controllers\ProductosController::class, 'index'])->name('administrador.inventario');    
Route::get('/blog/{productos:idproducto}',[App\Http\Controllers\FrontController::class, 'productos'])->name('productos');

/* PEDIDOS */
/* Route::get('administrador/productos/crear', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::post('administrador/productos/agregar', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('administrador/productos/edit/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('administrador.productos.edit');
Route::get('administrador/productos/actualizar/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');
Route::get('administrador/productos/eliminar/{id}',  [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy'); */
Route::get('administrador/pedidos',[App\Http\Controllers\PedidosController::class, 'index'])->name('administrador.pedidos');    

/* FACTURAS */
Route::get('administrador/facturas',[App\Http\Controllers\FacturasController::class, 'index3'])->name('administrador.facturas'); 
Route::post('cart/chekout', [App\Http\Controllers\FacturaController::class, 'store'])->name('facturas.store');

/* CONTABILIDAD */
Route::get('administrador/facturas',[App\Http\Controllers\ContabilidadController::class, 'index'])->name('administrador.contabilidad'); 

/* /Filtraciones/ */
//Route::get('/filtrarproductos', [App\Http\Controllers\SearchController::class, 'filtrar'])->name('filtrar');

/* /Barra de busqueda/ */
//Route::get('/myurl', [App\Http\Controllers\SearchController::class, 'show'])->name('show');
Route::get('/filtrar-productos',[App\Http\Controllers\FrontController::class, 'filtrar'])->name('filtrar.productos');

/* /Mis Favoritos/ */
Route::post('/like', [App\Http\Controllers\PostController::class,'like'])->name('like');

/* /Like List/ */
Route::get('/likeList', [App\Http\Controllers\PostController::class,'likeList'])->middleware('auth');

/* /Search/ */
Route::get('/buscar', [App\Http\Controllers\FrontController::class, 'buscar'])->name('buscar');
});
