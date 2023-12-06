<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Models\Productos;
use App\Models\Like;
use App\Models\Tipos;
use App\Models\Marcas;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        
        return view('dashboard', ['productos' => $productos]);
    }

    public function productos(Productos $productos){

        return view('productos', compact("productos"));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $resultados = Productos::where('descripcion', 'like', "%$query%")->get();
    
        return view('resultados', compact('resultados'));
        
    }

    public function filtrar(Request $request)
    {
        try{
             // Obtén todos los productos al principio
             $productos = Productos ::all();
            
             // Filtra los productos según los parámetros recibidos en la solicitud
             if ($request->has('idmarca')) {
                 // Filtra por marcas seleccionadas
                 $productos = $productos->whereIn('idmarca', $request->marcas);
             }
            
             if ($request->has('minPrice') && $request->has('maxPrice')) {
                 // Filtra por rango de precios
                 $productos = $productos->whereBetween('valor', [$request->minPrice, $request->maxPrice]);
             }
            
             if ($request->has('idtipo')) {
                 // Filtra por tipos seleccionados
                 $productos = $productos->whereIn('idtipo', $request->tipos);
             }

             // Puedes agregar más lógica de filtrado según sea necesario
              // Retorna la vista parcial con los productos filtrados
                    return view('front.partials.filtered_products', compact('productos'));
                } catch (\Exception $e) {
                    // Registra el error
                    \Log::error('Error en filtrarProductos: ' . $e->getMessage());
             
                    // Devuelve una respuesta de error al cliente
                    return response()->json(['error' => 'Error interno del servidor'], 500);
             
             // Retorna la vista parcial con los productos filtrados
             return view('front.partials.filtered_products', compact('dashboard'));
                    }
             
                }

}
