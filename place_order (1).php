<?php
session_start();
require_once(__DIR__."/../config/db.php");

$cart = $_SESSION['cart'] ?? [];
if (!$cart) die("Cart is empty");

$name = trim($_POST['name'] ?? "");
$phone = trim($_POST['phone'] ?? "");
$address = trim($_POST['address'] ?? "");
$city = trim($_POST['city'] ?? "");
$state = trim($_POST['state'] ?? "");
$pincode = trim($_POST['pincode'] ?? "");

if (!$name || !$phone || !$address || !$city || !$state || !$pincode) die("Missing fields");

$user_id = $_SESSION['user']['id'] ?? 0;

$ids = implode(",", array_map(fn($c) => (int)$c['product_id'], $cart));
$res = $conn->query("SELECT id, price, stock FROM products WHERE id IN ($ids)");

$map = [];
while($row = $res->fetch_assoc()) $map[$row['id']] = $row;

$total = 0;
foreach($cart as $c) {
  $p = $map[$c['product_id']] ?? null;
  if (!$p) die("Product missing");
  if ($c['qty'] > $p['stock']) die("Insufficient stock");
  $total += $p['price'] * $c['qty'];
}

$stmt = $conn->prepare("INSERT INTO orders (user_id, total, name, phone, address, city, state, pincode) VALUES (?,?,?,?,?,?,?,?)");
$stmt->bind_param("idssssss", $user_id, $total, $name, $phone, $address, $city, $state, $pincode);
$stmt->execute();
$order_id = $stmt->insert_id;

$oi = $conn->prepare("INSERT INTO order_items (order_id, product_id, qty, price) VALUES (?,?,?,?)");
foreach($cart as $c) {
  $p = $map[$c['product_id']];
  $qty = $c['qty'];
  $price = $p['price'];
  $oi->bind_param("iiid", $order_id, $p['id'], $qty, $price);
  $oi->execute();
  $conn->query("UPDATE products SET stock = stock - $qty WHERE id = ".$p['id']);
}

$_SESSION['cart'] = []; // clear cart

header("Location: /pages/order_success.php");
