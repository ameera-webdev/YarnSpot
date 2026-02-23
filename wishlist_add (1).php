<?php
session_start();
include_once(__DIR__ . '/../config/db.php');

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please login to add items to wishlist.";
    header("Location: ../pages/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$product_name = $_GET['product_name'] ?? '';

if ($product_name !== '') {
    $stmt = $pdo->prepare("INSERT INTO wishlist (user_id, product_name) VALUES (?, ?)");
    $stmt->execute([$user_id, $product_name]);
    $_SESSION['success'] = "Item added to wishlist!";
}

header("Location: ../pages/wishlist.php");
exit;
