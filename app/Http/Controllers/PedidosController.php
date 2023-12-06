<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallesPedido;
use App\Models\Pedidos;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Productos;
use DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = DB::table('pedidos')
            ->join('proveedores', 'pedidos.idproveedor', '=', 'proveedores.idproveedor')
            ->join('users', 'pedidos.idadministrador', '=', 'users.id')
            ->select('pedidos.idpedido','pedidos.fechahora','pedidos.plazoentrega','pedidos.total','proveedores.idproveedor','proveedores.nombre','proveedores.email','proveedores.telefono','users.id','users.name','users.apellido')
            ->orderBy('pedidos.fechahora', 'ASC')
            ->get();
    
        return $pedidos;
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
   /*      $proveedores = Proveedor::all();
        $administradores = User::all();
        $productos = Productos::all();
        return view('pedidos.create', compact('proveedores', 'administradores', 'productos')); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pedido = Pedidos::with(['proveedor', 'administrador', 'detallesPedido.producto'])->find($id);
        $proveedores = Proveedor::all();
        $administradores = User::all();
        $productos = Productos::all();
        return view('pedidos.edit', compact('pedido', 'proveedores', 'administradores', 'productos'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
