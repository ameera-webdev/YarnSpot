<?php
session_start();

$name = $_POST['product'] ?? '';
$price = (int)($_POST['price'] ?? 0);

if ($name && $price >= 0) {
  if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }

  $found = false;
  foreach ($_SESSION['cart'] as &$item) {
    if ($item['name'] === $name) {
      $item['qty'] = (int)$item['qty'] + 1;
      $found = true;
      break;
    }
  }
  if (!$found) {
    $_SESSION['cart'][] = ['name' => $name, 'price' => $price, 'qty' => 1];
  }
}

header('Location: ../pages/cart.php');
exit;
