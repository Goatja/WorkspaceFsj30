<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto de Consultas - Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0056b3;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: #fff;
            background-color: #0056b3;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #004494;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Proyecto de Consultas en Laravel</h1>
        <p>Esta es la página principal. Haz clic en el botón para ver los resultados de las consultas SQL requeridas.</p>
        <a href="{{ url('/consultas') }}" class="btn">Ver Consultas</a>
    </div>

</body>
</html>