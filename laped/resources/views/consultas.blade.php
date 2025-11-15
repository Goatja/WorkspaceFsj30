<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Consultas SQL en Laravel</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 900px; margin: 20px auto; padding: 0 20px; }
        h2 { color: #0056b3; border-bottom: 2px solid #0056b3; padding-bottom: 5px; margin-top: 30px; }
        pre { background-color: #f4f4f4; padding: 15px; border-radius: 5px; white-space: pre-wrap; word-wrap: break-word; }
        .query-block { margin-bottom: 25px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; }
        .query-title { font-weight: bold; color: #333; }
        .result-label { font-weight: bold; margin-top: 10px; display: block; }
    </style>
</head>
<body>

    <h1>Resultados de Consultas SQL en Laravel</h1>

    <div class="query-block">
        <p class="query-title">2. Pedidos del usuario con ID 2</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($pedidosUsuario2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">3. Pedidos con información del usuario</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($pedidosConUsuario, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">4. Pedidos con total entre $100 y $250</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($pedidosEnRango, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">5. Usuarios cuyo nombre empieza con "R"</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($usuariosConR, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">6. Total de pedidos del usuario con ID 5</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ $totalPedidosUsuario5 }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">7. Pedidos ordenados por total (descendente)</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($pedidosOrdenados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">8. Suma total de todos los pedidos</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ $sumaTotalPedidos }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">9. Pedido más económico (con usuario)</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($pedidoMasEconomico, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

    <div class="query-block">
        <p class="query-title">10. Pedidos agrupados por usuario</p>
        <span class="result-label">Resultado:</span>
        <pre>{{ json_encode($pedidosAgrupadosPorUsuario, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
    </div>

</body>
</html>
