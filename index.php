<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>YarnSpot | Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <style>
    /* Marquee Styles */
    .marquee {
      width: 100%;
      overflow: hidden;
      background: #fff;
      padding: 10px 0;
    }
    .marquee p {
      display: inline-block;
      white-space: nowrap;
      animation: scrollText 20s linear infinite;
      font-size: 18px;
      color: #d6336c;
      font-weight: 800;
    }
    @keyframes scrollText {
      from { transform: translateX(100%); }
      to { transform: translateX(-100%); }
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <?php include_once(__DIR__ . '/includes/header.php'); ?>

  <!-- Hero Section -->
  <section class="hero" style="background:#f8d7da; padding:40px 0; text-align:center;">
    <div class="container">
      <h1 style="color:#d6336c;">Welcome to YarnSpot</h1>
      <p>Your cozy corner for yarn, tools, and inspiration.</p>
    </div>
  </section>

  <!-- Scrolling Marquee -->
  <div class="marquee">
    <p>Quality Yarns • Endless Possibilities • One-Stop Shop for Knitting & Crochet • Yarns, Hooks & Needles • Crafted with Love</p>
  </div>

  <!-- Main Content -->
  <main class="container" style="padding:40px 0;">
    <h2>
      Hello <?= isset($_SESSION['fullname']) ? htmlspecialchars($_SESSION['fullname']) : 'Guest' ?>!
    </h2>
    <p>
    <?php if (isset($_SESSION['fullname'])): ?>
      Glad to see you back. Head over to the 
      <a href="pages/shop.php">Shop</a> or check your 
      <a href="pages/cart.php">Cart</a>.
      <br><br>
      <a href="actions/logout_action.php">Logout</a>
    <?php else: ?>
      Please <a href="pages/login.php">Login</a> or 
      <a href="pages/register.php">Register</a> to start shopping.
    <?php endif; ?>
    </p>

    <!-- About Crochet Section -->
    <section style="background:#fff; padding:40px; margin:40px auto; max-width:900px; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.08); text-align:center;">
      <h2 style="color:#d6336c; font-size:26px; margin-bottom:15px;">About Crochet</h2>
      <img src="assets/images/crochet.jpg" alt="Crochet Art" style="max-width:100%; border-radius:12px; margin-bottom:20px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <p style="font-size:16px; color:#555; line-height:1.6;">
        Crochet is more than just yarn and hooks — it’s an art form that weaves comfort, creativity, and tradition together. 
        Every stitch tells a story, whether it’s a cozy blanket, a delicate accessory, or a handmade gift crafted with love. 
        At YarnSpot, we celebrate this timeless craft by offering tools, threads, and inspiration for makers of all levels.
      </p>
    </section>

    <!-- About the Owner Section -->
    <section style="background:#fdf1f4; padding:40px; margin:40px auto; max-width:900px; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.08); text-align:center;">
      <h2 style="color:#d6336c; font-size:26px; margin-bottom:15px;">About the Owner</h2>
      <img src="assets/images/owner.jpg" alt="Owner Katheeja" style="width:200px; height:200px; object-fit:cover; border-radius:50%; margin-bottom:20px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <p style="font-size:16px; color:#555; line-height:1.6;">
        YarnSpot was founded by <strong>Katheeja</strong>, a passionate creator who believes in blending tradition with modern design. 
        With a love for pastel themes and professional polish, Katheeja built YarnSpot to be more than a shop — it’s a cozy space 
        where handmade artistry meets everyday life. Her vision is to make crochet accessible, inspiring, and a joy for everyone.
      </p>
    </section>
  </main>

  <!-- Footer -->
  <?php include_once(__DIR__ . '/includes/footer.php'); ?>
</body>
</html>
