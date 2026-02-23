<?php
session_start();

$index = (int)($_POST['index'] ?? -1);
$qty = (int)($_POST['qty'] ?? 1);
if ($qty < 1) $qty = 1;

if (isset($_SESSION['cart'][$index])) {
  $_SESSION['cart'][$index]['qty'] = $qty;
}

header('Location: ../pages/cart.php');
exit;
