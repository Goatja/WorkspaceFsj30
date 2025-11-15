<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PedidosController extends Controller
{
    //
    function pedidos(){
        $pedido = Pedidos::all();
        return response()->json([
            'pedidos' => $pedido,
            'message' => 'Pedidos retrieved successfully',
            'status' => 200
        ]);
    }

    public function insert(Request $request): JsonResponse
{
    $request->validate([
        'usuario_id' => 'required|exists:usuarios,id',
        'producto'   => 'required|string',
        'cantidad'   => 'required|integer|min:1',
        'total'      => 'required|numeric|min:0'
    ]);

    try {
        $pedido = Pedidos::create([
            'usuario_id' => $request->usuario_id,
            'producto'   => $request->producto,
            'cantidad'   => $request->cantidad,
            'total'      => $request->total,
        ]);

        return response()->json([
            'data'    => $pedido,
            'message' => 'Pedido creado exitosamente',
            'status'  => 201
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error creando pedido: '.$e->getMessage(),
            'status'  => 500
        ], 500);
    }
}

    
}
