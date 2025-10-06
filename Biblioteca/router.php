<?php

$request_uri = $_SERVER['REQUEST_URI'];

// Remove the base path from the request URI
$base_path = '/Biblioteca';
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

$request_path = parse_url($request_uri, PHP_URL_PATH);

if ($request_path === '/index.php' || $request_path === '') {
    require __DIR__ . '/views/home.php';
} else if ($request_path === '/login') {
    require __DIR__ . '/views/login.php';
} else if ($request_path === '/signup') {
    require __DIR__ . '/views/signup.php';
} else if ($request_path === '/dashboard') {
    require __DIR__ . '/views/dashboard.php';
} else if ($request_path === '/logout') {
    require __DIR__ . '/logout.php';
} else if ($request_path === '/autores') {
    require __DIR__ . '/views/autores.php';
} else if ($request_path === '/categorias') {
    require __DIR__ . '/views/categorias.php';
} else if ($request_path === '/libros') {
    require __DIR__ . '/views/libros.php';
} else if ($request_path === '/edit_autor') {
    require __DIR__ . '/views/edit_autor.php';
} else if ($request_path === '/delete_autor') {
    require __DIR__ . '/views/delete_autor.php';
} else if ($request_path === '/edit_categoria') {
    require __DIR__ . '/views/edit_categoria.php';
} else if ($request_path === '/delete_categoria') {
    require __DIR__ . '/views/delete_categoria.php';
} else if ($request_path === '/edit_libro') {
    require __DIR__ . '/views/edit_libro.php';
} else if ($request_path === '/delete_libro') {
    require __DIR__ . '/views/delete_libro.php';
} else if ($request_path === '/buscar') {
    require __DIR__ . '/views/buscar.php';
} else if ($request_path === '/prestar') {
    require __DIR__ . '/views/prestar.php';
} else if ($request_path === '/devolver') {
    require __DIR__ . '/views/devolver.php';
} else {
    http_response_code(404);
    require __DIR__ . '/views/404.php';
}
?>