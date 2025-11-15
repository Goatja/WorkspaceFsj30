<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    public function runQueries()
    {
        // 2. Recupera todos los pedidos asociados al usuario con ID 2.
        $pedidosUsuario2 = Pedidos::where('user_id', 2)->get();

        // 3. Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.
        $pedidosConUsuario = Pedidos::with('user')->get();

        // 4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
        $pedidosEnRango = Pedidos::whereBetween('total', [100, 250])->get();

        // 5. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
        $usuariosConR = User::where('name', 'like', 'R%')->get();

        // 6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
        $totalPedidosUsuario5 = Pedidos::where('user_id', 5)->count();

        // 7. Recupera todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido.
        $pedidosOrdenados = Pedidos::with('user')->orderBy('total', 'desc')->get();

        // 8. Obtén la suma total del campo "total" en la tabla de pedidos.
        $sumaTotalPedidos = Pedidos::sum('total');

        // 9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
        $pedidoMasEconomico = Pedidos::with('user')->orderBy('total', 'asc')->first();

        // 10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
        $pedidosAgrupadosPorUsuario = User::with('pedidos')->get();

        return view('consultas', [
            'pedidosUsuario2' => $pedidosUsuario2,
            'pedidosConUsuario' => $pedidosConUsuario,
            'pedidosEnRango' => $pedidosEnRango,
            'usuariosConR' => $usuariosConR,
            'totalPedidosUsuario5' => $totalPedidosUsuario5,
            'pedidosOrdenados' => $pedidosOrdenados,
            'sumaTotalPedidos' => $sumaTotalPedidos,
            'pedidoMasEconomico' => $pedidoMasEconomico,
            'pedidosAgrupadosPorUsuario' => $pedidosAgrupadosPorUsuario,
        ]);
    }
}