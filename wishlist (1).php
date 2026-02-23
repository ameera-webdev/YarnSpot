<?php
session_start();
include_once(__DIR__ . '/../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT product_name FROM wishlist WHERE user_id = ?");
$stmt->execute([$user_id]);
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Wishlist | YarnSpot</title>
  <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
  <?php include_once('../includes/header.php'); ?>

  <main class="container">
    <h2>Your Wishlist</h2>
    <ul>
      <?php foreach ($items as $item): ?>
        <li><?= htmlspecialchars($item['product_name']) ?></li>
      <?php endforeach; ?>
    </ul>
  </main>

  <footer><div class="container">© 2025 YarnSpot</div></footer>
</body>
</html>
