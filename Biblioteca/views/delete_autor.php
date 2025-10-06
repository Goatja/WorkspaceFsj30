<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

foreach ($_SESSION['autores'] as $key => $autor) {
    if ($autor['id'] == $id) {
        unset($_SESSION['autores'][$key]);
        break;
    }
}

header('Location: /autores');
exit();
?>