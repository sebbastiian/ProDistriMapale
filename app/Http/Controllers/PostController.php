<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use DB;

class PostController extends Controller
{


public function like():JsonResponse{
        
    $productos = productos::find(request()->id);

    if($productos->isLikedByLoggedInUser()){
        //dislike
        $result = Like::where([
            'iduser' => auth()->user()->id,
            'productos_idproducto' => request()->id
        ])->delete();
        return response()->json([
            'count' =>productos::find(request()->id)->likes->count(),
            'color' => 'text-dark'
        ], 200);

    }else{
        //like
        $like = new Like();
        $like->iduser = auth()->user()->id;
        $like->productos_idproducto = request()->id;
        $like->save();
        return response()->json([
            'count' =>productos::find(request()->id)->likes->count(),
            'color' => 'text-danger'
        ], 200);
    }

}

}
