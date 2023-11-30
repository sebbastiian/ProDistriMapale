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

/*FAVORITOS*/
//Route:: get('dashboard',[App\Http\Controllers\PostController::class, 'index'])->name('dashboard');

Route::post('/like', [App\Http\Controllers\PostController::class,'like'])->name('like');

/*CARRITO*/
Route:: get('dashboard',[App\Http\Controllers\FrontController::class, 'index'])->name('dashboard');
Route:: post('cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
Route:: get('cart/chekout', [App\Http\Controllers\CartController::class, 'chekout'])->name('chekout');
Route:: get('cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route:: post('cart/removeitem', [App\Http\Controllers\CartController::class, 'removeItem'])->name('removeItem');


/*USUARIOS*/
Route::get('administrador/index',[App\Http\Controllers\AdminController::class, 'index'])->name('administrador.index'); /* VISTA TABLAS */
Route::get('administrador/clientes',[App\Http\Controllers\UserController::class, 'index2'])->name('administrador.clientes'); /* TABLA CLIENTES */
Route::get('administrador/transportadores',[App\Http\Controllers\UserController::class, 'index3'])->name('administrador.transportadores'); /* TABLA TRASPORTADORES */
/* FACTURAS */
Route::get('administrador/facturas',[App\Http\Controllers\AdminController::class, 'index3'])->name('administrador.facturas'); 

/* VEHICULOS */
Route::get('administrador/vehiculos',[App\Http\Controllers\VehiculosController::class, 'index'])->name('administrador.vehiculos'); /* TABLA DE VEHICULOS */

/* PROGRAMACIONES */
Route::get('administrador/programaciones',[App\Http\Controllers\AdminController::class, 'index5'])->name('administrador.programaciones'); /* TABLA DE PROGRAMACIONES */

/*TIPO*/
Route::get('administrador/tipos/crear', [App\Http\Controllers\TiposController::class, 'create'])->name('tipos.create');
Route::post('administrador/tipos/agregar', [App\Http\Controllers\TiposController::class, 'store'])->name('tipos.store');
Route::get('administrador/tipos/edit/{id}', [App\Http\Controllers\TiposController::class, 'edit'])->name('administrador.tipos.edit');
Route::get('administrador/{tipos}/actualizar', [App\Http\Controllers\TiposController::class, 'update'])->name('tipos.update');
Route::get('administrador/tipos/eliminar/{id}',  [App\Http\Controllers\TiposController::class, 'destroy'])->name('tipos.destroy');
Route::get('administrador/inventario',[App\Http\Controllers\TiposController::class, 'index'])->name('administrador.inventario');

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
