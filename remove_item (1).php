<?php
session_start();

$index = isset($_POST['index']) ? (int)$_POST['index'] : -1;

if ($index >= 0 && isset($_SESSION['cart'][$index])) {
    array_splice($_SESSION['cart'], $index, 1);
}

header('Location: ../pages/cart.php');
exit;
