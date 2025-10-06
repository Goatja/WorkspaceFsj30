<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

foreach ($_SESSION['libros'] as &$libro) {
    if ($libro['id'] == $id) {
        $libro['estado'] = 'prestado';
        break;
    }
}

header('Location: /buscar');
exit();
?>