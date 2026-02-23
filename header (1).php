<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$base = '/YARNSPOT';
$cartCount = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) { 
    $cartCount += (int)$item['qty']; 
  }
}
?>
<header class="site-header">
  <div class="container flex between">
    <div class="logo">
      <a href="<?= $base ?>/index.php"><span class="brand">YarnSpot</span></a>
    </div>
    <nav class="main-nav">
      <ul>
        <li><a href="<?= $base ?>/index.php">Home</a></li>
        <li class="has-mega">
          <a href="<?= $base ?>/pages/shop.php" class="nav-link">Shop</a>
          <!-- mega menu code unchanged -->
        </li>
        <li><a href="<?= $base ?>/pages/cart.php">Cart (<?= $cartCount ?>)</a></li>

        <!-- ✅ Dynamic login/register/logout -->
        <?php if(isset($_SESSION['user_id'])): ?>
          <li><a href="<?= $base ?>/actions/logout_action.php">Logout</a></li>
        <?php else: ?>
          <li><a href="<?= $base ?>/pages/login.php">Login</a></li>
          <li><a href="<?= $base ?>/pages/register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </nav>
    <div class="header-actions">
      <a href="../pages/wishlist.php">Add to Wishlist</a>
    <form method="get" action="../pages/shop.php" class="search-form">
  <input type="text" name="q" placeholder="Search products..." />
  <button type="submit">Search</button>
</form>

    </div>
  </div>
</header>
