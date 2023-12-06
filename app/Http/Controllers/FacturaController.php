<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\DetalleFactura;

class FacturaController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Obtener datos del usuario
            $nombretienda = $request->input('nombretienda');
            $fechahora = $request->input('fechahora');

           // Crear una nueva factura
           $factura = new Factura();
           $factura->nit = $nombretienda; // Asignar nombretienda a nit
           $factura->fechahora = $fechahora;
           $factura->total = $request->input('total');
           $factura->save();


            // Obtener detalles de la factura
            $detallesFactura = json_decode($request->input('detallesFactura'), true);

            // Guardar detalles de la factura en la base de datos
            foreach ($detallesFactura as $detalle) {
                $detalleFactura = new DetalleFactura();
                $detalleFactura->factura_id = $factura->id;
                $detalleFactura->idproducto = $detalle['id']; // Asignar idproducto
                $detalleFactura->cantidad = $detalle['qty']; // Asignar cantidad
                $detalleFactura->valorunitario = $detalle['price']; // Asignar valorunitario
                $detalleFactura->valortotal = $detalle['total']; // Asignar valortotal
                $detalleFactura->fechahora = $detalle['fechahora'];
                $detalleFactura->save();
            }

            return response()->json(['message' => 'Factura creada exitosamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
