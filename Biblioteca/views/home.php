<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
} else {
    header('Location: /dashboard');
    exit();
}
?>