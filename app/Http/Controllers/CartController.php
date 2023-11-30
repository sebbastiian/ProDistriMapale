<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Productos;
use App\Models\Like;
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
        return view('front.cart.chekout');
    }

    public function removeItem(Request $request){
        Cart::remove($request->rowId);
        return redirect()->back()->with("success","Producto Eliminado!");
    }

    public function clear(){
        Cart::destroy();
        return redirect()->back()->with("success","Carrito vacio!");
    }


}
