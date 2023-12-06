<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\Tipos;
use App\Models\Marcas;

class SearchController extends Controller
{
    public function filtrar(Request $request)
    {
        // Recibe los filtros desde la solicitud AJAX
        $marcas = $request->input('nombre');
        $tipos = $request->input('nombre');
        $precioMin = $request->input('valor')[0];
        $precioMax = $request->input('valor')[1];

        // Lógica de filtrado basada en los parámetros recibidos en $request
        $query = Producto::query();

        // Filtrar por marcas
        if (!empty($marcas)) {
            $query->whereIn('nombre', $marcas);
        }

        // Filtrar por tipos
        if (!empty($tipos)) {
            $query->whereIn('nombre', $tipos);
        }

        // Filtrar por rango de precios
        if ($precioMin != 'min' && $precioMax != 'max') {
            $query->whereBetween('valor', [$precioMin, $precioMax]);
        }

        // Consulta los productos filtrados en la base de datos
        $productosFiltrados = $query->get();

        // Puedes devolver los productos filtrados como respuesta JSON
        return response()->json(['productos' => $productosFiltrados]);
    }

    
}