<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Productos;
use App\Models\Like;
use App\Models\User;
use App\Models\Factura;
use App\Models\DetallesFactura;
use Cart;
use DB;

class CartController extends Controller
{
    public function add(Request $request){

        $productos = productos::find($request->idproducto);
        if(empty($productos))
           return redirect('/');

        Cart::add(
            $productos->idproducto,
            $productos->descripcion,
            1,
            $productos->valor,
            ["imagen"=>$productos->imagen]
        );


        return redirect()->back()->with("success","Producto agregado!: ". $productos->descripcion);
    }

    public function chekout(){

        $user = auth ()-> user();
        return view('front.cart.chekout' , ['user' => $user]);
        
    }

    public function removeItem(Request $request){
        Cart::remove($request->id);
        return redirect()->back()->with("success","Producto Eliminado!");
    }

    public function clear(){
        Cart::destroy();
        return redirect()->back()->with("success","Carrito vacio!");
    }

    public function increaseQuantity(Request $request){
        $productos = Cart::content()->where("rowId",$request->id)->first();
        Cart::update($request->id,["qty" =>  $productos ->qty + 1]);
        return redirect()->back()->with("success","Producto Agregado!");
    }

    public function decreaseQuantity(Request $request){
        $productos = Cart::content()->where("rowId",$request->id)->first();
        Cart::update($request->id,["qty" => $productos ->qty - 1]);
        return redirect()->back()->with("success","Producto extra Eliminado!");
    }

    public function confirmarCarrito(){
        $factura = new factura(); 
        $factura->fechahora = date("y-m-d h:m:s");
        $factura->total = Cart::total();
        $factura->impuesto = Cart::tax();
        $factura->estado = "pendiente";
        $factura->idcliente = auth()->user()->id;
        $factura->save();

        foreach (Cart::content() as $fila){
            $detallesfactura = new DetallesFactura();
            $detallesfactura->idfactura = $factura->idfactura;
            $detallesfactura->idproducto = $fila->id;
            $detallesfactura->cantidad = $fila->qty;
            $detallesfactura->valorunitario = $fila->price;
            $detallesfactura->valortotal = Cart::total();
            $detallesfactura->importe = $fila->price * $fila->qty;
            $detallesfactura->save();
        }
        Cart::destroy();
        return redirect()->back()->with("success","Tu pedido esta en camino!");
        
    }



}
