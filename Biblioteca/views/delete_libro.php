<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

foreach ($_SESSION['libros'] as $key => $libro) {
    if ($libro['id'] == $id) {
        unset($_SESSION['libros'][$key]);
        break;
    }
}

header('Location: /libros');
exit();
?>